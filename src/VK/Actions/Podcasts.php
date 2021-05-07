<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;

class Podcasts {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Podcasts constructor.
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
     *      - string search_string:
     *      - integer offset:
     *      - integer count:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function searchPodcast(string $access_token, array $params = array()) {
        return $this->request->post('podcasts.searchPodcast', $access_token, $params);
    }
}
