<?php

namespace VK\Exceptions\Api;

class VKApiFriendsAddYourselfException extends VKApiException {
    /**
     * VKApiFriendsAddYourselfException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(174, 'Cannot add user himself as friend', $message);
    }
}
