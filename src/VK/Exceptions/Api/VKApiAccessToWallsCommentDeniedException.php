<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToWallsCommentDeniedException extends VKApiException {
    /**
     * VKApiAccessToWallsCommentDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(211, 'Access to wall\'s comment denied', $error);
    }
}
