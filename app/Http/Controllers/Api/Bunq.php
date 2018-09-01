<?php
/**
 * Created by PhpStorm.
 * User: thijs
 * Date: 1/09/18
 * Time: 1:48 AM
 */

namespace App\Http\Controllers\Api;


use App\Exceptions\BunqConnectionException;
use App\Http\Controllers\Controller;
use bunq\Context\ApiContext;
use bunq\Context\BunqContext;
use bunq\Exception\BadRequestException;
use bunq\Model\Generated\Endpoint\MonetaryAccountBank;
use bunq\Model\Generated\Endpoint\RequestInquiry;
use bunq\Model\Generated\Endpoint\UserPerson;
use bunq\Model\Generated\Object\Amount;
use bunq\Model\Generated\Object\NotificationFilter;
use bunq\Model\Generated\Object\Pointer;
use bunq\Util\BunqEnumApiEnvironmentType;

class Bunq extends Controller
{
    const CURRENCY_TYPE_EUR = 'EUR';
    const POINTER_TYPE_EMAIL = 'EMAIL';
    const MONETARY_ACCOUNT_STATUS_ACTIVE = 'ACTIVE';
    const NOTIFICATION_DELIVERY_METHOD_URL = 'URL';
    const NOTIFICATION_CATEGORY_REQUEST = 'REQUEST';

    private $user;

    public function __construct()
    {
        $this->setupContext();
        $this->setupCurrentUser();
    }

    /**
     * Restores the context from the saved file during creation.
     */
    private function setupContext()
    {
        $apiContext = ApiContext::restore(config('services.bunq.path'));
        $apiContext->ensureSessionActive();
        $apiContext->save(config('services.bunq.path'));
        BunqContext::loadApiContext($apiContext);
    }

    private function setupCurrentUser()
    {
        if (BunqContext::getUserContext()->isOnlyUserCompanySet()) {
            $this->user = BunqContext::getUserContext()->getUserCompany();
        } elseif (BunqContext::getUserContext()->isOnlyUserPersonSet()) {
            $this->user = BunqContext::getUserContext()->getUserPerson();
        } else {
            throw new BunqConnectionException("Error setting up current user");
        }
    }

    public function createContext()
    {
        $environmentType   = BunqEnumApiEnvironmentType::PRODUCTION();
        $deviceDescription = config('app.name');
        $permittedIps      = []; // List the real expected IPs of this device or leave empty to use the current IP

        try {
            $apiContext = ApiContext::create(
                $environmentType,
                config('services.bunq.token'),
                $deviceDescription,
                $permittedIps
            );
        } catch (BadRequestException $exception) {
            throw new BunqConnectionException($exception->getMessage());
        }

        BunqContext::loadApiContext($apiContext);
        $fileName = config('services.bunq.path');
        $apiContext->save($fileName);

        return $apiContext;
    }

    public function makeRequest($amount = null, $recipient = '', $description = '')
    {
        // Create a new request and retrieve it's id.
        return RequestInquiry::create(
            new Amount($amount, self::CURRENCY_TYPE_EUR),
            new Pointer(self::POINTER_TYPE_EMAIL, $recipient),
            $description,
            true,
            config('services.bunq.main_account')
        )->getValue();
    }

    public function addCallbackUrl()
    {
        $callbackUrl = config('services.bunq.callback_uri');

        // Get the existing filters to not override the current filters.
        $allCurrentNotificationFilter = $this->user->getNotificationFilters();

        foreach ($allCurrentNotificationFilter as $notificationFilter) {
            if ($notificationFilter->getNotificationDeliveryMethod() === self::NOTIFICATION_DELIVERY_METHOD_URL && $notificationFilter->getCategory() === self::NOTIFICATION_CATEGORY_REQUEST) {
                $allUpdatedNotificationFilter[] = $notificationFilter;
            }
        }

        $allUpdatedNotificationFilter[] = new NotificationFilter(
            self::NOTIFICATION_DELIVERY_METHOD_URL,
            $callbackUrl,
            self::NOTIFICATION_CATEGORY_REQUEST
        );

        UserPerson::update(
            $this->user->getId(),
            null, /* firstName */
            null, /* middleName */
            null, /* lastName */
            null, /* publicNickName */
            null, /* addressMain */
            null, /* addressPostal */
            null, /* avatarUuid */
            null, /* taxResident */
            null, /* documentType */
            null, /* documentNumber */
            null, /* documentCountryOfIssuance */
            null, /* documentFrontAttachmentId */
            null, /* documentBackAttachmentId */
            null, /* dataOfBirth */
            null, /* placeOfBirth */
            null, /* countryOfBirth */
            null, /* nationality */
            null, /* language */
            null, /* region */
            null, /* gender */
            null, /* status */
            null, /* subStatus */
            null, /* legalGuardianAlias */
            null, /* sessionTimeout */
            null, /* CardIds */
            null, /* cardLimits */
            null, /* dailyLimitWithoutConfirmationLogin */
            $allUpdatedNotificationFilter
        );
    }
}