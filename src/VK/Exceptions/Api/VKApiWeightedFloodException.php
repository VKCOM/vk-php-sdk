<?php

namespace VK\Exceptions\Api;

class VKApiWeightedFloodException extends VKApiException {
    /**
     * VKApiWeightedFloodException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(601, 'Permission denied. You have requested too many actions this day. Try later.', $message);
    }
}
