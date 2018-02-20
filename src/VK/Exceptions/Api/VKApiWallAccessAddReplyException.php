<?php

namespace VK\Exceptions\Api;

class VKApiWallAccessAddReplyException extends VKApiException {
    /**
     * VKApiWallAccessAddReplyException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(213, 'Access to status replies denied', $message);
    }
}
