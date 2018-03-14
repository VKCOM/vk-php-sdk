<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAppsAlreadyUnlockedException extends VKApiException {
    /**
     * VKApiAppsAlreadyUnlockedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1251, 'This achievement is already unlocked', $error);
    }
}
