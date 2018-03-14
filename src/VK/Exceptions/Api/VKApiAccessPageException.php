<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessPageException extends VKApiException {
    /**
     * VKApiAccessPageException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(141, 'Access to page denied', $error);
    }
}
