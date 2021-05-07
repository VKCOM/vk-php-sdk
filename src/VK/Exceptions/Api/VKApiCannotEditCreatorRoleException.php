<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCannotEditCreatorRoleException extends VKApiException {
    /**
     * VKApiCannotEditCreatorRoleException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(700, 'Cannot edit creator role', $error);
    }
}
