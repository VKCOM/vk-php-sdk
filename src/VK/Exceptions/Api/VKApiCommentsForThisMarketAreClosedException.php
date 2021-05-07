<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCommentsForThisMarketAreClosedException extends VKApiException {
    /**
     * VKApiCommentsForThisMarketAreClosedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1401, 'Comments for this market are closed', $error);
    }
}
