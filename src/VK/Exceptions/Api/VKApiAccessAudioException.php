<?php

namespace VK\Exceptions\Api;

class VKApiAccessAudioException extends VKApiException {
    /**
     * VKApiAccessAudioException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(201, 'Access denied', $message);
    }
}
