<?php

namespace VK\Exceptions\Api;

class VKApiCommunitiesCatalogDisabledException extends VKApiException {
    /**
     * VKApiCommunitiesCatalogDisabledException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1310, 'Catalog is not available for this user', $message);
    }
}
