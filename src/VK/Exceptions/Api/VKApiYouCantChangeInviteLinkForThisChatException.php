<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiYouCantChangeInviteLinkForThisChatException extends VKApiException {
    /**
     * VKApiYouCantChangeInviteLinkForThisChatException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(931, 'You can\'t change invite link for this chat', $error);
    }
}
