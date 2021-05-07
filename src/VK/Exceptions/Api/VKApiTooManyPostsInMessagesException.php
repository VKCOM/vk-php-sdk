<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyPostsInMessagesException extends VKApiException {
    /**
     * VKApiTooManyPostsInMessagesException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(940, 'Too many posts in messages', $error);
    }
}
