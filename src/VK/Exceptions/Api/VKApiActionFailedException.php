<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiActionFailedException extends VKApiException {
    /**
     * VKApiActionFailedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(106, 'Unable to process action', $error);
    }
}
