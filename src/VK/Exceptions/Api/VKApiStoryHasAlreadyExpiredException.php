<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiStoryHasAlreadyExpiredException extends VKApiException {
    /**
     * VKApiStoryHasAlreadyExpiredException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1600, 'Story has already expired', $error);
    }
}
