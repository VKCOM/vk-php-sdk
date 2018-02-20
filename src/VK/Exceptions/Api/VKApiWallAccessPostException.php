<?php

namespace VK\Exceptions\Api;

class VKApiWallAccessPostException extends VKApiException {
    /**
     * VKApiWallAccessPostException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(210, 'Access to wall\'s post denied', $message);
    }
}
