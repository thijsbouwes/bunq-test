<?php

namespace App\Http\Controllers\Api;


use App\Events\GameChanged;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BunqCallback
{
    const NOTIFICATION_CATEGORY_REQUEST = 'REQUEST';
    const STATUS_REJECTED = 'REQUEST_INQUIRY_REJECTED';
    const STATUS_ACCEPTED = 'REQUEST_INQUIRY_ACCEPTED';

    public function log(Request $request)
    {
        $data = $request->all();

        if (key_exists('NotificationUrl', $data) === false) {
            return;
        }

        $category = $data['NotificationUrl']['category'];
        $type =  $data['NotificationUrl']['event_type'];

        if ($category !== self::NOTIFICATION_CATEGORY_REQUEST && in_array($type, [self::STATUS_REJECTED, self::STATUS_ACCEPTED]) === false) {
            return;
        }

        $id = $data['NotificationUrl']['object']['RequestInquiry']['id'];
        Log::info("Payment: " . $type . " with id: " . $id);

        switch ($type) {
            case self::STATUS_REJECTED:
                $paymentStatus = 'rejected';
                break;
            case self::STATUS_ACCEPTED:
                $paymentStatus = 'accepted';
                break;
            default:
                $paymentStatus = 'pending';
                break;
        }

        $user = User::whereHas('games', function($query) use ($id) {
            $query->where('payment_reference', $id);
        })->firstOrFail();

        $game = Game::whereHas('users', function($query) use ($user, $id) {
            $query->where('payment_reference', $id);
        })->firstOrFail();

        $user->games()->updateExistingPivot($game->id, [
            'payment_status' => $paymentStatus
        ]);

        event(new GameChanged($game));

        return response()->json();
    }
}