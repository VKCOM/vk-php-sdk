<?php

namespace VK\Exceptions\Api;

class ApiAccessAlbumException extends VKApiException {
    /**
     * ApiAccessAlbumException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(200,  'Access denied',  $message);
    }
}
