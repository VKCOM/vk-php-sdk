<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiMarketTooManyAlbumsException extends VKApiException {
    /**
     * VKApiMarketTooManyAlbumsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1407, 'Too many albums', $error);
    }
}
