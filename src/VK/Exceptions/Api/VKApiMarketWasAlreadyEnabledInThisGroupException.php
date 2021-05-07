<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketWasAlreadyEnabledInThisGroupException extends VKApiException {
    /**
     * VKApiMarketWasAlreadyEnabledInThisGroupException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1431, 'Market was already enabled in this group', $error);
    }
}
