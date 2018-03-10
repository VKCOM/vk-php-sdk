<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiVideoCommentsClosedException extends VKApiException {
    /**
     * VKApiVideoCommentsClosedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(801, 'Comments for this video are closed', $error);
    }
}
