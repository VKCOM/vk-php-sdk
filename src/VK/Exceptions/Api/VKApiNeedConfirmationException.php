<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiNeedConfirmationException extends VKApiException {
    /**
     * VKApiNeedConfirmationException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(24, 'Confirmation required', $error);
    }
}
