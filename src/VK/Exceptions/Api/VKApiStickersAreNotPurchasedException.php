<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiStickersAreNotPurchasedException extends VKApiException {
    /**
     * VKApiStickersAreNotPurchasedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(2100, 'Stickers are not purchased', $error);
    }
}
