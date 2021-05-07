<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiItemHasBadLinksInDescriptionException extends VKApiException {
    /**
     * VKApiItemHasBadLinksInDescriptionException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1408, 'Item has bad links in description', $error);
    }
}
