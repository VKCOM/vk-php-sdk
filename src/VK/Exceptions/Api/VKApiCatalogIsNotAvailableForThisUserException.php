<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCatalogIsNotAvailableForThisUserException extends VKApiException {
    /**
     * VKApiCatalogIsNotAvailableForThisUserException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1310, 'Catalog is not available for this user', $error);
    }
}
