<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidAlbumIdException extends VKApiException {
    /**
     * VKApiInvalidAlbumIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(114, 'Invalid album id', $error);
    }
}
