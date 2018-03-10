<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiFriendsAddYourselfException extends VKApiException {
    /**
     * VKApiFriendsAddYourselfException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(174, 'Cannot add user himself as friend', $error);
    }
}
