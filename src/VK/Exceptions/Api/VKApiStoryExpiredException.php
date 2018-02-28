<?php

namespace VK\Exceptions\Api;

class VKApiStoryExpiredException extends VKApiException {
    /**
     * VKApiStoryExpiredException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1600, 'Story has already expired', $message);
    }
}
