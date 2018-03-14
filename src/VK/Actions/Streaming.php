<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Streaming {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Streaming constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Allows to receive data for the connection to Streaming API.
     *
     * @param $access_token string
     * @param $params array
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getServerUrl(string $access_token, array $params = array()) {
        return $this->request->post('streaming.getServerUrl', $access_token, $params);
    }
}
