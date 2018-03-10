<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiSaveFileException extends VKApiException {
    /**
     * VKApiSaveFileException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(105, 'Couldn\'t save file', $error);
    }
}
