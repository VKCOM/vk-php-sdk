<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiPollsAnswerIdException extends VKApiException {
    /**
     * VKApiPollsAnswerIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(252, 'Invalid answer id', $error);
    }
}
