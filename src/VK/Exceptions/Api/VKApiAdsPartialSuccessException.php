<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAdsPartialSuccessException extends VKApiException {
    /**
     * VKApiAdsPartialSuccessException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(602, 'Some part of the request has not been completed', $error);
    }
}
