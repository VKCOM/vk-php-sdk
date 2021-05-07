<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantSendMessagesToThisUserDueToTheirPrivacySettingsException extends VKApiException {
    /**
     * VKApiCantSendMessagesToThisUserDueToTheirPrivacySettingsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(902, 'Can\'t send messages to this user due to their privacy settings', $error);
    }
}
