<?php

namespace VK\Exceptions\Api;

class VKApiAccessCommentException extends VKApiException {
    /**
     * VKApiAccessCommentException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(183, 'Access to comment denied', $message);
    }
}
