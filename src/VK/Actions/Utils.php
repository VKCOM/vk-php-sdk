<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\UtilsGetLinkStatsInterval;

class Utils {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Utils constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Checks whether a link is blocked in VK.
     * 
     * @param $access_token string
     * @param $params array
     *      - string url: Link to check (e.g., 'http://google.com').
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function checkLink(string $access_token, array $params = array()) {
        return $this->request->post('utils.checkLink', $access_token, $params);
    }

    /**
     * Deletes shortened link from user's list.
     * 
     * @param $access_token string
     * @param $params array
     *      - string key: Link key (characters after vk.cc/).
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteFromLastShortened(string $access_token, array $params = array()) {
        return $this->request->post('utils.deleteFromLastShortened', $access_token, $params);
    }

    /**
     * Returns a list of user's shortened links.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer count: Number of links to return.
     *      - integer offset: Offset needed to return a specific subset of links.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getLastShortenedLinks(string $access_token, array $params = array()) {
        return $this->request->post('utils.getLastShortenedLinks', $access_token, $params);
    }

    /**
     * Returns stats data for shortened link.
     * 
     * @param $access_token string
     * @param $params array
     *      - string key: Link key (characters after vk.cc/).
     *      - string access_key: Access key for private link stats.
     *      - UtilsGetLinkStatsInterval interval: Interval.
     *        @see UtilsGetLinkStatsInterval
     *      - integer intervals_count: Number of intervals to return.
     *      - boolean extended: 1 — to return extended stats data (sex, age, geo). 0 — to return views number
     *        only.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getLinkStats(string $access_token, array $params = array()) {
        return $this->request->post('utils.getLinkStats', $access_token, $params);
    }

    /**
     * Allows to receive a link shortened via vk.cc.
     * 
     * @param $access_token string
     * @param $params array
     *      - string url: URL to be shortened.
     *      - boolean private: 1 — private stats, 0 — public stats.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getShortLink(string $access_token, array $params = array()) {
        return $this->request->post('utils.getShortLink', $access_token, $params);
    }

    /**
     * Detects a type of object (e.g., user, community, application) and its ID by screen name.
     * 
     * @param $access_token string
     * @param $params array
     *      - string screen_name: Screen name of the user, community (e.g., 'apiclub,' 'andrew', or
     *        'rules_of_war'), or application.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function resolveScreenName(string $access_token, array $params = array()) {
        return $this->request->post('utils.resolveScreenName', $access_token, $params);
    }

    /**
     * Returns the current time of the VK server.
     * 
     * @param $access_token string
     * @param $params array
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getServerTime(string $access_token, array $params = array()) {
        return $this->request->post('utils.getServerTime', $access_token, $params);
    }
}
