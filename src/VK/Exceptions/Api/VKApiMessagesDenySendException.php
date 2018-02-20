<?php

namespace VK\Exceptions\Api;

class VKApiMessagesDenySendException extends VKApiException {
    /**
     * VKApiMessagesDenySendException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(901, 'Can\'t send messages for users without dialogs', $message);
    }
}
