<?php

namespace VK\Exceptions\Api;

class VKApiAlbumsLimitException extends VKApiException {
    /**
     * VKApiAlbumsLimitException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(302, 'Albums number limit is reached', $message);
    }
}
