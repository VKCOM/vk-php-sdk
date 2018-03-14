<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiWallAccessPostException extends VKApiException {
    /**
     * VKApiWallAccessPostException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(210, 'Access to wall\'s post denied', $error);
    }
}
