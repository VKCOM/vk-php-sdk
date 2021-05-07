<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantAddUserToChatBecauseUserHasNoAccessToGroupException extends VKApiException {
    /**
     * VKApiCantAddUserToChatBecauseUserHasNoAccessToGroupException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(947, 'Can\'t add user to chat because user has no access to group', $error);
    }
}
