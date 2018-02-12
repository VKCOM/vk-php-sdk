<?php

namespace VK\Exceptions\Api;

class ApiMethodPermissionException extends VKApiException {
    /**
     * ApiMethodPermissionException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(20,  'Permission to perform this action is denied for non-standalone applications',  $message);
    }
}
