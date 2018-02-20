<?php

namespace VK\Exceptions\Api;

class VKApiWallTooManyRecipientsException extends VKApiException {
    /**
     * VKApiWallTooManyRecipientsException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(220, 'Too many recipients', $message);
    }
}
