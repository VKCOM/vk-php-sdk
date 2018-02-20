<?php

namespace VK\Exceptions\Api;

class VKApiStatusNoAudioException extends VKApiException {
    /**
     * VKApiStatusNoAudioException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(221, 'User disabled track name broadcast', $message);
    }
}
