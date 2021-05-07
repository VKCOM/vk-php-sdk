<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToAddingPostDeniedException extends VKApiException {
    /**
     * VKApiAccessToAddingPostDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(214, 'Access to adding post denied', $error);
    }
}
