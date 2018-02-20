<?php

namespace VK\Exceptions\Api;

class VKApiFriendsAddEnemyException extends VKApiException {
    /**
     * VKApiFriendsAddEnemyException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(176, 'Cannot add this user to friends as you put him on blacklist', $message);
    }
}
