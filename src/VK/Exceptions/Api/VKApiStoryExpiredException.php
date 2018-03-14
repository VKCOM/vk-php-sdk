<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiStoryExpiredException extends VKApiException {
    /**
     * VKApiStoryExpiredException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1600, 'Story has already expired', $error);
    }
}
