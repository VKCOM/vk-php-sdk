<?php

namespace VK\Exceptions\Api;

class VKApiUserDeletedException extends VKApiException {
    /**
     * VKApiUserDeletedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(18, 'User was deleted or banned', $message);
    }
}
