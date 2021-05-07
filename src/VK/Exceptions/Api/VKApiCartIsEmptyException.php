<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCartIsEmptyException extends VKApiException {
    /**
     * VKApiCartIsEmptyException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1427, 'Cart is empty', $error);
    }
}
