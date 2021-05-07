<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiPermissionDenied.YouHaveRequestedTooManyActionsThisDay.TryLater.Exception extends VKApiException {
    /**
     * VKApiPermissionDenied.YouHaveRequestedTooManyActionsThisDay.TryLater.Exception constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(601, 'Permission denied. You have requested too many actions this day. Try later.', $error);
    }
}
