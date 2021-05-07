<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantSendMessagesForUsersFromBlacklistException extends VKApiException {
    /**
     * VKApiCantSendMessagesForUsersFromBlacklistException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(900, 'Can\'t send messages for users from blacklist', $error);
    }
}
