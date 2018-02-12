<?php

namespace VK\Exceptions\Api;

class ApiParamTimestampException extends VKApiException {
    /**
     * ApiParamTimestampException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(150,  'Invalid timestamp',  $message);
    }
}
