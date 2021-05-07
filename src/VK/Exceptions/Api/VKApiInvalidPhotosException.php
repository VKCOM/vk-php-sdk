<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidPhotosException extends VKApiException {
    /**
     * VKApiInvalidPhotosException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(122, 'Invalid photos', $error);
    }
}
