<?php

namespace VK\Exceptions\Api;

class VKApiActionFailedException extends VKApiException {
    /**
     * VKApiActionFailedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(106, 'Unable to process action', $message);
    }
}
