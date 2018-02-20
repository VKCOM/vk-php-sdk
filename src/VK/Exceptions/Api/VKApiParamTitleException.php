<?php

namespace VK\Exceptions\Api;

class VKApiParamTitleException extends VKApiException {
    /**
     * VKApiParamTitleException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(119, 'Invalid title', $message);
    }
}
