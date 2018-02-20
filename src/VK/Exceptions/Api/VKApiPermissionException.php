<?php

namespace VK\Exceptions\Api;

class VKApiPermissionException extends VKApiException {
    /**
     * VKApiPermissionException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(7, 'Permission to perform this action is denied', $message);
    }
}
