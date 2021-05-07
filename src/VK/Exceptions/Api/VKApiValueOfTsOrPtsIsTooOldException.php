<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiValueOfTsOrPtsIsTooOldException extends VKApiException {
    /**
     * VKApiValueOfTsOrPtsIsTooOldException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(907, 'Value of ts or pts is too old', $error);
    }
}
