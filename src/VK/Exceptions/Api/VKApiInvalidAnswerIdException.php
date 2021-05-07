<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidAnswerIdException extends VKApiException {
    /**
     * VKApiInvalidAnswerIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(252, 'Invalid answer id', $error);
    }
}
