<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToPostCommentsDeniedException extends VKApiException {
    /**
     * VKApiAccessToPostCommentsDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(212, 'Access to post comments denied', $error);
    }
}
