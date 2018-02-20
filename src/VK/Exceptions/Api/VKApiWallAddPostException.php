<?php

namespace VK\Exceptions\Api;

class VKApiWallAddPostException extends VKApiException {
    /**
     * VKApiWallAddPostException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(214, 'Access to adding post denied', $message);
    }
}
