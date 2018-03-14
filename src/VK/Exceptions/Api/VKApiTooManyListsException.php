<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiTooManyListsException extends VKApiException {
    /**
     * VKApiTooManyListsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1170, 'Too many feed lists', $error);
    }
}
