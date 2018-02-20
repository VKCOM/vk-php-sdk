<?php

namespace VK\Exceptions\Api;

class VKApiVotesPermissionException extends VKApiException {
    /**
     * VKApiVotesPermissionException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(500, 'Permission denied. You must enable votes processing in application settings', $message);
    }
}
