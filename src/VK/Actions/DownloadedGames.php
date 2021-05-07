<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;

class DownloadedGames {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * DownloadedGames constructor.
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
     *      - integer user_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function getPaidStatus(string $access_token, array $params = array()) {
        return $this->request->post('downloadedGames.getPaidStatus', $access_token, $params);
    }
}
