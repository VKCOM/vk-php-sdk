<?php

namespace VK\Exceptions\Api;

class VKApiAlbumFullException extends VKApiException {
    /**
     * VKApiAlbumFullException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(300, 'This album is full', $message);
    }
}
