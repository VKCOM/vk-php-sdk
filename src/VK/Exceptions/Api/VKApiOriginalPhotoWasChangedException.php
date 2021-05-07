<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiOriginalPhotoWasChangedException extends VKApiException {
    /**
     * VKApiOriginalPhotoWasChangedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1160, 'Original photo was changed', $error);
    }
}
