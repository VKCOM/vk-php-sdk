<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiItemMustHaveDistinctPropertiesException extends VKApiException {
    /**
     * VKApiItemMustHaveDistinctPropertiesException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1426, 'Item must have distinct properties', $error);
    }
}
