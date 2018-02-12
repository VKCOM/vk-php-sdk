<?php

namespace VK\Exceptions\Api;

class ApiCaptchaException extends VKApiException {
    /**
     * ApiCaptchaException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(14,  'Captcha needed',  $message);
    }
}
