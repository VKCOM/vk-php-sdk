<?php

namespace VK\Exceptions\Api;

class VKApiSameCheckinException extends VKApiException {
    /**
     * VKApiSameCheckinException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(190, 'You have sent same checkin in last 10 minutes', $message);
    }
}
