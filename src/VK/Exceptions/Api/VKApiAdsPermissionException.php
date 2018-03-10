<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAdsPermissionException extends VKApiException {
    /**
     * VKApiAdsPermissionException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(600, 'Permission denied. You have no access to operations specified with given object(s)', $error);
    }
}
