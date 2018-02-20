<?php

namespace VK\Exceptions\Api;

class VKApiNeedConfirmationException extends VKApiException {
    /**
     * VKApiNeedConfirmationException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(24, 'Confirmation required', $message);
    }
}
