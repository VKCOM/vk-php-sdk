<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCannotAddThisUserToFriendsAsYouPutHimOnBlacklistException extends VKApiException {
    /**
     * VKApiCannotAddThisUserToFriendsAsYouPutHimOnBlacklistException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(176, 'Cannot add this user to friends as you put him on blacklist', $error);
    }
}
