<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantSendMessagesForUsersWithoutPermissionException extends VKApiException {
    /**
     * VKApiCantSendMessagesForUsersWithoutPermissionException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(901, 'Can\'t send messages for users without permission', $error);
    }
}
