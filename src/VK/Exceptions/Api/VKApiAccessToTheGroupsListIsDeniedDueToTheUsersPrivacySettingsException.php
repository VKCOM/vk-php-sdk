<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToTheGroupsListIsDeniedDueToTheUsersPrivacySettingsException extends VKApiException {
    /**
     * VKApiAccessToTheGroupsListIsDeniedDueToTheUsersPrivacySettingsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(260, 'Access to the groups list is denied due to the user\'s privacy settings', $error);
    }
}
