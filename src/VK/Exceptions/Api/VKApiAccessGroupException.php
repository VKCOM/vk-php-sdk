<?php

namespace VK\Exceptions\Api;

class VKApiAccessGroupException extends VKApiException {
    /**
     * VKApiAccessGroupException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(203, 'Access to group denied', $message);
    }
}
