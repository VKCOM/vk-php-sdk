<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;

class Auth {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Auth constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Allows to restore account access using a code received via SMS. " This method is only available for apps with
     * [vk.com/dev/auth_direct|Direct authorization] access. "
     *
     * @param $access_token string
     * @param $params array
     *      - string phone: User phone number.
     *      - string last_name: User last name.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function restore(string $access_token, array $params = array()) {
        return $this->request->post('auth.restore', $access_token, $params);
    }
}
