<?php

namespace VK\Exceptions\Api;

class VKApiPhoneAlreadyUsedException extends VKApiException {
    /**
     * VKApiPhoneAlreadyUsedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1004, 'This phone number is used by another user', $message);
    }
}
