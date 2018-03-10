<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiWallAccessRepliesException extends VKApiException {
    /**
     * VKApiWallAccessRepliesException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(212, 'Access to post comments denied', $error);
    }
}
