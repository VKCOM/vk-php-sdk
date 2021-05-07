<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyAddressesInClubException extends VKApiException {
    /**
     * VKApiTooManyAddressesInClubException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(706, 'Too many addresses in club', $error);
    }
}
