<?php

namespace VK\Exceptions\Api;

class VKApiParamPhotoException extends VKApiException {
    /**
     * VKApiParamPhotoException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(129, 'Invalid photo', $message);
    }
}
