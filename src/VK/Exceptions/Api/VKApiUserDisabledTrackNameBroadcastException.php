<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUserDisabledTrackNameBroadcastException extends VKApiException {
    /**
     * VKApiUserDisabledTrackNameBroadcastException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(221, 'User disabled track name broadcast', $error);
    }
}
