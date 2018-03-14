<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessNoteException extends VKApiException {
    /**
     * VKApiAccessNoteException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(181, 'Access to note denied', $error);
    }
}
