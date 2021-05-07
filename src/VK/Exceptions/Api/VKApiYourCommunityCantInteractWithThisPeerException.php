<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiYourCommunityCantInteractWithThisPeerException extends VKApiException {
    /**
     * VKApiYourCommunityCantInteractWithThisPeerException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(932, 'Your community can\'t interact with this peer', $error);
    }
}
