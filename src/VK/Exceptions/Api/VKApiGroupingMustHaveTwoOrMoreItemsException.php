<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiGroupingMustHaveTwoOrMoreItemsException extends VKApiException {
    /**
     * VKApiGroupingMustHaveTwoOrMoreItemsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1425, 'Grouping must have two or more items', $error);
    }
}
