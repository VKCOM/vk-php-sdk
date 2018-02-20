<?php

namespace VK\Exceptions\Api;

class VKApiMarketTooManyItemsException extends VKApiException {
    /**
     * VKApiMarketTooManyItemsException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1405, 'Too many items', $message);
    }
}
