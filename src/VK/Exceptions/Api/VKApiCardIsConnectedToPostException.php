<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCardIsConnectedToPostException extends VKApiException {
    /**
     * VKApiCardIsConnectedToPostException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1902, 'Card is connected to post', $error);
    }
}
