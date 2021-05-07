<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCannotPinOne-timeStoryException extends VKApiException {
    /**
     * VKApiCannotPinOne-timeStoryException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(942, 'Cannot pin one-time story', $error);
    }
}
