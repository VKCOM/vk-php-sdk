<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCannotAddThisUserToFriendsAsTheyHavePutYouOnTheirBlacklistException extends VKApiException {
    /**
     * VKApiCannotAddThisUserToFriendsAsTheyHavePutYouOnTheirBlacklistException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(175, 'Cannot add this user to friends as they have put you on their blacklist', $error);
    }
}
