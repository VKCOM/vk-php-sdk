<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiMarketCommentsClosedException extends VKApiException {
    /**
     * VKApiMarketCommentsClosedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1401, 'Comments for this market are closed', $error);
    }
}
