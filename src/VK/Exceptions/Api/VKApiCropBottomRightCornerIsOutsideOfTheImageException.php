<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCropBottomRightCornerIsOutsideOfTheImageException extends VKApiException {
    /**
     * VKApiCropBottomRightCornerIsOutsideOfTheImageException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1434, 'Crop bottom right corner is outside of the image', $error);
    }
}
