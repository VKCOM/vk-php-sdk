<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiThisIsAChatBotFeatureChangeThisStatusInSettingsException extends VKApiException {
    /**
     * VKApiThisIsAChatBotFeatureChangeThisStatusInSettingsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(912, 'This is a chat bot feature change this status in settings', $error);
    }
}
