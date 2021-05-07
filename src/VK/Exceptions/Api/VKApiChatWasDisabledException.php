<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiChatWasDisabledException extends VKApiException {
    /**
     * VKApiChatWasDisabledException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(945, 'Chat was disabled', $error);
    }
}
