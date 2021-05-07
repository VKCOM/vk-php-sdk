<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyOfficersInClubException extends VKApiException {
    /**
     * VKApiTooManyOfficersInClubException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(702, 'Too many officers in club', $error);
    }
}
