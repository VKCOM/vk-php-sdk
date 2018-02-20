<?php

namespace VK\Exceptions\Api;

class VKApiVotesException extends VKApiException {
    /**
     * VKApiVotesException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(503, 'Not enough votes', $message);
    }
}
