<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiFriendsListLimitException extends VKApiException {
    /**
     * VKApiFriendsListLimitException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(173, 'Reached the maximum number of lists', $error);
    }
}
