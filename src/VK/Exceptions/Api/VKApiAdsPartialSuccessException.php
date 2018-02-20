<?php

namespace VK\Exceptions\Api;

class VKApiAdsPartialSuccessException extends VKApiException {
    /**
     * VKApiAdsPartialSuccessException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(602, 'Some part of the request has not been completed', $message);
    }
}
