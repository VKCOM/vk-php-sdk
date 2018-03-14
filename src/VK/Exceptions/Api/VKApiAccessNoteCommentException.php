<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessNoteCommentException extends VKApiException {
    /**
     * VKApiAccessNoteCommentException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(182, 'You can\'t comment this note', $error);
    }
}
