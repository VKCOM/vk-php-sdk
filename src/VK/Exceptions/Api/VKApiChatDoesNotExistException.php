<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiChatDoesNotExistException extends VKApiException {
    /**
     * VKApiChatDoesNotExistException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(927, 'Chat does not exist', $error);
    }
}
