<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAlbumsLimitException extends VKApiException {
    /**
     * VKApiAlbumsLimitException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(302, 'Albums number limit is reached', $error);
    }
}
