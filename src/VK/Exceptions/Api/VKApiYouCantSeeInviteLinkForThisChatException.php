<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiYouCantSeeInviteLinkForThisChatException extends VKApiException {
    /**
     * VKApiYouCantSeeInviteLinkForThisChatException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(919, 'You can\'t see invite link for this chat', $error);
    }
}
