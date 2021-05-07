<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiExtendedMarketNotEnabledException extends VKApiException {
    /**
     * VKApiExtendedMarketNotEnabledException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1409, 'Extended market not enabled', $error);
    }
}
