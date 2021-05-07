<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCommentsForThisVideoAreClosedException extends VKApiException {
    /**
     * VKApiCommentsForThisVideoAreClosedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(801, 'Comments for this video are closed', $error);
    }
}
