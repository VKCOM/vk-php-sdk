<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiSomePartOfTheRequestHasNotBeenCompletedException extends VKApiException {
    /**
     * VKApiSomePartOfTheRequestHasNotBeenCompletedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(602, 'Some part of the request has not been completed', $error);
    }
}
