<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiThisAchievementIsAlreadyUnlockedException extends VKApiException {
    /**
     * VKApiThisAchievementIsAlreadyUnlockedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1251, 'This achievement is already unlocked', $error);
    }
}
