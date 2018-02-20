<?php

namespace VK\Exceptions\Api;

class VKApiSaveFileException extends VKApiException {
    /**
     * VKApiSaveFileException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(105, 'Couldn\'t save file', $message);
    }
}
