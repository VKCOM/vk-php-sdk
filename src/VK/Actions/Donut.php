<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;

class Donut {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Donut constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer offset:
     *      - integer count:
     *      - array fields:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getFriends(string $access_token, array $params = array()) {
        return $this->request->post('donut.getFriends', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function getSubscription(string $access_token, array $params = array()) {
        return $this->request->post('donut.getSubscription', $access_token, $params);
    }

    /**
     * Returns a list of user's VK Donut subscriptions.
     *
     * @param $access_token string
     * @param $params array
     *      - array fields:
     *      - integer offset:
     *      - integer count:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getSubscriptions(string $access_token, array $params = array()) {
        return $this->request->post('donut.getSubscriptions', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function isDon(string $access_token, array $params = array()) {
        return $this->request->post('donut.isDon', $access_token, $params);
    }
}
