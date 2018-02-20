<?php

namespace VK\Exceptions\Api;

class VKApiParamPhotosException extends VKApiException {
    /**
     * VKApiParamPhotosException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(122, 'Invalid photos', $message);
    }
}
