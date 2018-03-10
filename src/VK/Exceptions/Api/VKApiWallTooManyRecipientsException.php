<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiWallTooManyRecipientsException extends VKApiException {
    /**
     * VKApiWallTooManyRecipientsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(220, 'Too many recipients', $error);
    }
}
