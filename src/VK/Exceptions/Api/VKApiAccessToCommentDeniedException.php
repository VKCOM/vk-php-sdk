<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToCommentDeniedException extends VKApiException {
    /**
     * VKApiAccessToCommentDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(183, 'Access to comment denied', $error);
    }
}
