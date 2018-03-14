<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiVotesException extends VKApiException {
    /**
     * VKApiVotesException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(503, 'Not enough votes', $error);
    }
}
