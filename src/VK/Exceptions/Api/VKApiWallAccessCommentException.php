<?php

namespace VK\Exceptions\Api;

class VKApiWallAccessCommentException extends VKApiException {
    /**
     * VKApiWallAccessCommentException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(211, 'Access to wall\'s comment denied', $message);
    }
}
