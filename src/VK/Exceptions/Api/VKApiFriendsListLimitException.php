<?php

namespace VK\Exceptions\Api;

class VKApiFriendsListLimitException extends VKApiException {
    /**
     * VKApiFriendsListLimitException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(173, 'Reached the maximum number of lists', $message);
    }
}
