<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCannotAddThisUserToFriendsAsUserNotFoundException extends VKApiException {
    /**
     * VKApiCannotAddThisUserToFriendsAsUserNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(177, 'Cannot add this user to friends as user not found', $error);
    }
}
