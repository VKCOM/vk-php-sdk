<?php

namespace VK\Exceptions\Api;

class VKApiMarketItemNotFoundException extends VKApiException {
    /**
     * VKApiMarketItemNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1403, 'Item not found', $message);
    }
}
