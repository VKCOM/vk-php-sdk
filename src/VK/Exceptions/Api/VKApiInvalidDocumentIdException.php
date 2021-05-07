<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidDocumentIdException extends VKApiException {
    /**
     * VKApiInvalidDocumentIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1150, 'Invalid document id', $error);
    }
}
