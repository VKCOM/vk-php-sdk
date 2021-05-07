<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantSentThisMessageBecauseItsTooBigException extends VKApiException {
    /**
     * VKApiCantSentThisMessageBecauseItsTooBigException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(910, 'Can\'t sent this message because it\'s too big', $error);
    }
}
