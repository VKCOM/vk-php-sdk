<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCannotAddUserHimselfAsFriendException extends VKApiException {
    /**
     * VKApiCannotAddUserHimselfAsFriendException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(174, 'Cannot add user himself as friend', $error);
    }
}
