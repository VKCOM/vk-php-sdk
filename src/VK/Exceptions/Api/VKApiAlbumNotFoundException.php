<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAlbumNotFoundException extends VKApiException {
    /**
     * VKApiAlbumNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1402, 'Album not found', $error);
    }
}
