<?php

namespace VK\Exceptions\Api;

class ApiVotesPermissionException extends VKApiException {
    /**
     * ApiVotesPermissionException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(500,  'Permission denied. You must enable votes processing in application settings',  $message);
    }
}
