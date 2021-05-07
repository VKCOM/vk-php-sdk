<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyFavoriteStickersException extends VKApiException {
    /**
     * VKApiTooManyFavoriteStickersException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(2101, 'Too many favorite stickers', $error);
    }
}
