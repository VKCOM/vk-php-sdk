<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiItemAlreadyAddedToAlbumException extends VKApiException {
    /**
     * VKApiItemAlreadyAddedToAlbumException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1404, 'Item already added to album', $error);
    }
}
