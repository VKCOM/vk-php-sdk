<?php

namespace VK\Exceptions\Api;

class VKApiMarketTooManyItemsInAlbumException extends VKApiException {
    /**
     * VKApiMarketTooManyItemsInAlbumException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1406, 'Too many items in album', $message);
    }
}
