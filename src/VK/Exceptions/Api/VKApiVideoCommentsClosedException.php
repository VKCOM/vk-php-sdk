<?php

namespace VK\Exceptions\Api;

class VKApiVideoCommentsClosedException extends VKApiException {
    /**
     * VKApiVideoCommentsClosedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(801, 'Comments for this video are closed', $message);
    }
}
