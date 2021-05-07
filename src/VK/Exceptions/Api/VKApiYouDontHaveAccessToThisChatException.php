<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiYouDontHaveAccessToThisChatException extends VKApiException {
    /**
     * VKApiYouDontHaveAccessToThisChatException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(917, 'You don\'t have access to this chat', $error);
    }
}
