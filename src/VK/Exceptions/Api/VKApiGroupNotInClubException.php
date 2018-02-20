<?php

namespace VK\Exceptions\Api;

class VKApiGroupNotInClubException extends VKApiException {
    /**
     * VKApiGroupNotInClubException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(701, 'User should be in club', $message);
    }
}
