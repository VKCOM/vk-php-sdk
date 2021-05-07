<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiSpecifiedLinkIsIncorrect(cantFindSource)Exception extends VKApiException {
    /**
     * VKApiSpecifiedLinkIsIncorrect(cantFindSource)Exception constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(3102, 'Specified link is incorrect (can\'t find source)', $error);
    }
}
