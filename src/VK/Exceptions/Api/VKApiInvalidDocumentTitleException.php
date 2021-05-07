<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidDocumentTitleException extends VKApiException {
    /**
     * VKApiInvalidDocumentTitleException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1152, 'Invalid document title', $error);
    }
}
