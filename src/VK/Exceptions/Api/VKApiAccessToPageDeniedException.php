<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToPageDeniedException extends VKApiException {
    /**
     * VKApiAccessToPageDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(141, 'Access to page denied', $error);
    }
}
