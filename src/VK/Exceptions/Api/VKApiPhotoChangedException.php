<?php

namespace VK\Exceptions\Api;

class VKApiPhotoChangedException extends VKApiException {
    /**
     * VKApiPhotoChangedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1160, 'Original photo was changed', $message);
    }
}
