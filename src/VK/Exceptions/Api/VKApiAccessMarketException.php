<?php

namespace VK\Exceptions\Api;

class VKApiAccessMarketException extends VKApiException {
    /**
     * VKApiAccessMarketException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(205, 'Access denied', $message);
    }
}
