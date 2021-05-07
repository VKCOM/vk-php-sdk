<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInviteLinkIsInvalid-ExpiredDeletedOrNotExistsException extends VKApiException {
    /**
     * VKApiInviteLinkIsInvalid-ExpiredDeletedOrNotExistsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(714, 'Invite link is invalid - expired deleted or not exists', $error);
    }
}
