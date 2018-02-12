<?php

namespace VK\Exceptions\Api;

class ApiMethodAdsException extends VKApiException {
    /**
     * ApiMethodAdsException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(21,  'Permission to perform this action is allowed only for standalone and OpenAPI applications',  $message);
    }
}
