<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdvertisementPostWasRecentlyAddedException extends VKApiException {
    /**
     * VKApiAdvertisementPostWasRecentlyAddedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(219, 'Advertisement post was recently added', $error);
    }
}
