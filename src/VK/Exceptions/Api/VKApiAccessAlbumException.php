<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessAlbumException extends VKApiException {
    /**
     * VKApiAccessAlbumException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(200, 'Access denied', $error);
    }
}
