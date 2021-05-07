<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUserShouldBeInClubException extends VKApiException {
    /**
     * VKApiUserShouldBeInClubException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(701, 'User should be in club', $error);
    }
}
