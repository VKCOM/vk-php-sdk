<?php

namespace VK\Exceptions\Api;

class VKApiUploadException extends VKApiException {
    /**
     * VKApiUploadException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(22, 'Upload error', $message);
    }
}
