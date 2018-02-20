<?php

namespace VK\Exceptions\Api;

class VKApiPollsAnswerIdException extends VKApiException {
    /**
     * VKApiPollsAnswerIdException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(252, 'Invalid answer id', $message);
    }
}
