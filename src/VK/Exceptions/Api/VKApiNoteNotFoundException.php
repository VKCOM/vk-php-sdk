<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiNoteNotFoundException extends VKApiException {
    /**
     * VKApiNoteNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(180, 'Note not found', $error);
    }
}
