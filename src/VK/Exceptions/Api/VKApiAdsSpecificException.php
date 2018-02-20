<?php

namespace VK\Exceptions\Api;

class VKApiAdsSpecificException extends VKApiException {
    /**
     * VKApiAdsSpecificException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(603, 'Some ads error occured', $message);
    }
}
