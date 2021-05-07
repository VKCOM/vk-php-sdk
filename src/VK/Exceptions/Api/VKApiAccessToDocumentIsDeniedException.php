<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToDocumentIsDeniedException extends VKApiException {
    /**
     * VKApiAccessToDocumentIsDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1153, 'Access to document is denied', $error);
    }
}
