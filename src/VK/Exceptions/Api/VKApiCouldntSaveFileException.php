<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCouldntSaveFileException extends VKApiException {
    /**
     * VKApiCouldntSaveFileException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(105, 'Couldn\'t save file', $error);
    }
}
