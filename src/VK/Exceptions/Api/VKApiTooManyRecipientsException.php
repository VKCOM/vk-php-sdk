<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyRecipientsException extends VKApiException {
    /**
     * VKApiTooManyRecipientsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(220, 'Too many recipients', $error);
    }
}
