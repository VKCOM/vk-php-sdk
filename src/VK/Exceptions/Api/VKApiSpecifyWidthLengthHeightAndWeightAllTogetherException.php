<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiSpecifyWidthLengthHeightAndWeightAllTogetherException extends VKApiException {
    /**
     * VKApiSpecifyWidthLengthHeightAndWeightAllTogetherException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1429, 'Specify width length height and weight all together', $error);
    }
}
