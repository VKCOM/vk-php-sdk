<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiFriendsAddInEnemyException extends VKApiException {
    /**
     * VKApiFriendsAddInEnemyException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(175, 'Cannot add this user to friends as they have put you on their blacklist', $error);
    }
}
