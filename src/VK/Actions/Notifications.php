<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Notifications {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Notifications constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a list of notifications about other users' feedback to the current user's wall posts.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer count: Number of notifications to return.
     *      - string start_from:
     *      - array filters: Type of notifications to return: 'wall' — wall posts, 'mentions' — mentions in
     *        wall posts, comments, or topics, 'comments' — comments to wall posts, photos, and videos, 'likes' —
     *        likes, 'reposted' — wall posts that are copied from the current user's wall, 'followers' — new
     *        followers, 'friends' — accepted friend requests
     *      - integer start_time: Earliest timestamp (in Unix time) of a notification to return. By default, 24
     *        hours ago.
     *      - integer end_time: Latest timestamp (in Unix time) of a notification to return. By default, the
     *        current time.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('notifications.get', $access_token, $params);
    }

    /**
     * Resets the counter of new notifications about other users' feedback to the current user's wall posts.
     * 
     * @param $access_token string
     * @param $params array
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function markAsViewed(string $access_token, array $params = array()) {
        return $this->request->post('notifications.markAsViewed', $access_token, $params);
    }
}
