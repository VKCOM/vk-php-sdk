<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiGroupingAlreadyHasSuchVariantException extends VKApiException {
    /**
     * VKApiGroupingAlreadyHasSuchVariantException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1413, 'Grouping already has such variant', $error);
    }
}
