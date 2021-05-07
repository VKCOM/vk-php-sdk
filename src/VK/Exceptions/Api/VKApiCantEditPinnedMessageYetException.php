<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantEditPinnedMessageYetException extends VKApiException {
    /**
     * VKApiCantEditPinnedMessageYetException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(949, 'Can\'t edit pinned message yet', $error);
    }
}
