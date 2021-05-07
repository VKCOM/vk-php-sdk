<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyFeedListsException extends VKApiException {
    /**
     * VKApiTooManyFeedListsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1170, 'Too many feed lists', $error);
    }
}
