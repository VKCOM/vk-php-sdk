<?php

namespace VK\Exceptions\Api;

class VKApiParamNoteIdException extends VKApiException {
    /**
     * VKApiParamNoteIdException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(180, 'Note not found', $message);
    }
}
