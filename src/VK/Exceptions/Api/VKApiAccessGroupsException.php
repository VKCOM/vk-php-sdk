<?php

namespace VK\Exceptions\Api;

class VKApiAccessGroupsException extends VKApiException {
    /**
     * VKApiAccessGroupsException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(260, 'Access to the groups list is denied due to the user\'s privacy settings', $message);
    }
}
