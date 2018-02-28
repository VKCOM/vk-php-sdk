<?php

namespace VK\Exceptions\Api;

class VKApiWallAdsPostLimitReachedException extends VKApiException {
    /**
     * VKApiWallAdsPostLimitReachedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(224, 'Too many ads posts', $message);
    }
}
