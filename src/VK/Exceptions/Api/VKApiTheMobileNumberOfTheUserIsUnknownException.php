<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTheMobileNumberOfTheUserIsUnknownException extends VKApiException {
    /**
     * VKApiTheMobileNumberOfTheUserIsUnknownException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(146, 'The mobile number of the user is unknown', $error);
    }
}
