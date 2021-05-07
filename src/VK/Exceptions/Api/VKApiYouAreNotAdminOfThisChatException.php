<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiYouAreNotAdminOfThisChatException extends VKApiException {
    /**
     * VKApiYouAreNotAdminOfThisChatException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(925, 'You are not admin of this chat', $error);
    }
}
