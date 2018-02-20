<?php

namespace VK\Exceptions\Api;

class VKApiMarketCommentsClosedException extends VKApiException {
    /**
     * VKApiMarketCommentsClosedException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1401, 'Comments for this market are closed', $message);
    }
}
