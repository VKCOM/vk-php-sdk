<?php

namespace VK\Exceptions\Api;

class VKApiMessagesUserBlockedException extends VKApiException {
    /**
     * VKApiMessagesUserBlockedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(900, 'Can\'t send messages for users from blacklist', $message);
    }
}
