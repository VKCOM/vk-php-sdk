<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiReactionCanNotBeAppliedToTheObjectException extends VKApiException {
    /**
     * VKApiReactionCanNotBeAppliedToTheObjectException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(232, 'Reaction can not be applied to the object', $error);
    }
}
