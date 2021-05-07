<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiApplicationIsNotInstalledInCommunityException extends VKApiException {
    /**
     * VKApiApplicationIsNotInstalledInCommunityException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(711, 'Application is not installed in community', $error);
    }
}
