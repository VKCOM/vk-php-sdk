<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamPhotoException extends VKApiException {
    /**
     * VKApiParamPhotoException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(129, 'Invalid photo', $error);
    }
}
