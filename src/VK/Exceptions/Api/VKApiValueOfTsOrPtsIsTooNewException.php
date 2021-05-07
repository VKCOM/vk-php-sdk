<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiValueOfTsOrPtsIsTooNewException extends VKApiException {
    /**
     * VKApiValueOfTsOrPtsIsTooNewException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(908, 'Value of ts or pts is too new', $error);
    }
}
