<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiHyperlinksAreForbiddenException extends VKApiException {
    /**
     * VKApiHyperlinksAreForbiddenException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(222, 'Hyperlinks are forbidden', $error);
    }
}
