<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiWallAccessCommentException extends VKApiException {
    /**
     * VKApiWallAccessCommentException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(211, 'Access to wall\'s comment denied', $error);
    }
}
