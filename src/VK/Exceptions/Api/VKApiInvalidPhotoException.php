<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidPhotoException extends VKApiException {
    /**
     * VKApiInvalidPhotoException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(129, 'Invalid photo', $error);
    }
}
