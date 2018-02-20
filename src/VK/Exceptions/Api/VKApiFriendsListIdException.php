<?php

namespace VK\Exceptions\Api;

class VKApiFriendsListIdException extends VKApiException {
    /**
     * VKApiFriendsListIdException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(171, 'Invalid list id', $message);
    }
}
