<?php

namespace VK\Exceptions\Api;

class VKApiWallAdsPublishedException extends VKApiException {
    /**
     * VKApiWallAdsPublishedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(219, 'Advertisement post was recently added', $message);
    }
}
