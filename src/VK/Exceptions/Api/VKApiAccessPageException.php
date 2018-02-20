<?php

namespace VK\Exceptions\Api;

class VKApiAccessPageException extends VKApiException {
    /**
     * VKApiAccessPageException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(141, 'Access to page denied', $message);
    }
}
