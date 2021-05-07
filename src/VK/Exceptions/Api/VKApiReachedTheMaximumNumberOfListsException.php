<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiReachedTheMaximumNumberOfListsException extends VKApiException {
    /**
     * VKApiReachedTheMaximumNumberOfListsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(173, 'Reached the maximum number of lists', $error);
    }
}
