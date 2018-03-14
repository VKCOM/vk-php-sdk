<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiWallLinksForbiddenException extends VKApiException {
    /**
     * VKApiWallLinksForbiddenException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(222, 'Hyperlinks are forbidden', $error);
    }
}
