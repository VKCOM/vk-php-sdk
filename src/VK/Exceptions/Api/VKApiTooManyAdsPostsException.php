<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyAdsPostsException extends VKApiException {
    /**
     * VKApiTooManyAdsPostsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(224, 'Too many ads posts', $error);
    }
}
