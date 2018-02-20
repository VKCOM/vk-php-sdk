<?php

namespace VK\Exceptions\Api;

class VKApiBlockedException extends VKApiException {
    /**
     * VKApiBlockedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(19, 'Content blocked', $message);
    }
}
