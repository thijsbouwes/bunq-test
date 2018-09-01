<?php

namespace App\Jobs;

use App\Game;
use App\Http\Controllers\Api\Bunq;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class RequestPaymentForGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $game;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Game $game)
    {
        $this->user = $user;
        $this->game = $game;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $price = $this->game->price;
        $description = $this->game->name . ' payment to participate.';

        $bunq = new Bunq();
        $referenceId = $bunq->makeRequest($price, $this->user->email, $description);

        $this->user->games()->updateExistingPivot($this->game->id, [
            'payment_reference' => $referenceId,
        ]);

        Log::info("Created request for user: " . $this->user->id . " with ref: " . $referenceId);
    }
}
