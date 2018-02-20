<?php

namespace VK\Exceptions\Api;

class VKApiMethodPermissionException extends VKApiException {
    /**
     * VKApiMethodPermissionException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(20, 'Permission to perform this action is denied for non-standalone applications', $message);
    }
}
