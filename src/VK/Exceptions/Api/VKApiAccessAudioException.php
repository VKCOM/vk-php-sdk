<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessAudioException extends VKApiException {
    /**
     * VKApiAccessAudioException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(201, 'Access denied', $error);
    }
}
