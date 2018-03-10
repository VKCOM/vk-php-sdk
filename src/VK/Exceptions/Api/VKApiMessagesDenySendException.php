<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiMessagesDenySendException extends VKApiException {
    /**
     * VKApiMessagesDenySendException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(901, 'Can\'t send messages for users without dialogs', $error);
    }
}
