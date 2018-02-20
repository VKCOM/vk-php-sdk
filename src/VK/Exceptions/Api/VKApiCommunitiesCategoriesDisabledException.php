<?php

namespace VK\Exceptions\Api;

class VKApiCommunitiesCategoriesDisabledException extends VKApiException {
    /**
     * VKApiCommunitiesCategoriesDisabledException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1311, 'Catalog categories are not available for this user', $message);
    }
}
