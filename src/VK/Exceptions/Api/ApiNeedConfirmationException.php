<?php

namespace VK\Exceptions\Api;

class ApiNeedConfirmationException extends VKApiException {
    /**
     * ApiNeedConfirmationException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(24,  'Confirmation required',  $message);
    }
}
