<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;
use VK\Actions\Enum\StatsGetInterval;

class Stats {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Stats constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns statistics of a community or an application.
     *
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID.
     *      - integer app_id: Application ID.
     *      - integer timestamp_from:
     *      - integer timestamp_to:
     *      - StatsGetInterval interval:
     *        @see StatsGetInterval
     *      - integer intervals_count:
     *      - array filters:
     *      - array stats_groups:
     *      - boolean extended:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('stats.get', $access_token, $params);
    }

    /**
     * Returns stats for a wall post.
     *
     * @param $access_token string
     * @param $params array
     *      - string owner_id: post owner community id. Specify with "-" sign.
     *      - array post_ids: wall posts id
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function getPostReach(string $access_token, array $params = array()) {
        return $this->request->post('stats.getPostReach', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - string id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function trackVisitor(string $access_token, array $params = array()) {
        return $this->request->post('stats.trackVisitor', $access_token, $params);
    }
}
