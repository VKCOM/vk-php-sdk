<?php

namespace VK\Exceptions\Api;

class VKApiAuthDelayException extends VKApiException {
    /**
     * VKApiAuthDelayException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1112, 'Processing. Try later', $message);
    }
}
