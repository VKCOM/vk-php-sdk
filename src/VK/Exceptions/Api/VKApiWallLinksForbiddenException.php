<?php

namespace VK\Exceptions\Api;

class VKApiWallLinksForbiddenException extends VKApiException {
    /**
     * VKApiWallLinksForbiddenException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(222, 'Hyperlinks are forbidden', $message);
    }
}
