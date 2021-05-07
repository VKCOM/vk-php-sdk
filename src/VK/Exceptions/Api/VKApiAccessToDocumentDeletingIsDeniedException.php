<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToDocumentDeletingIsDeniedException extends VKApiException {
    /**
     * VKApiAccessToDocumentDeletingIsDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1151, 'Access to document deleting is denied', $error);
    }
}
