<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAlbumFullException extends VKApiException {
    /**
     * VKApiAlbumFullException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(300, 'This album is full', $error);
    }
}
