<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessCommentException extends VKApiException {
    /**
     * VKApiAccessCommentException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(183, 'Access to comment denied', $error);
    }
}
