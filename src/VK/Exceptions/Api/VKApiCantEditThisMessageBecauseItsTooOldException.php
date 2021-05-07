<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantEditThisMessageBecauseItsTooOldException extends VKApiException {
    /**
     * VKApiCantEditThisMessageBecauseItsTooOldException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(909, 'Can\'t edit this message because it\'s too old', $error);
    }
}
