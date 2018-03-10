<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiCaptchaException extends VKApiException {
    /**
     * VKApiCaptchaException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(14, 'Captcha needed', $error);
    }
}
