<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;
use VK\Actions\Enum\NotificationsSendMessageSendingMode;

class Notifications {

    /**
     * @var VKApiRequest
     */
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
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
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
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function markAsViewed(string $access_token, array $params = array()) {
        return $this->request->post('notifications.markAsViewed', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - array user_ids:
     *      - string message:
     *      - string fragment:
     *      - integer group_id:
     *      - integer random_id:
     *      - NotificationsSendMessageSendingMode sending_mode: Type of sending (delivering) notifications:
     *        'immediately' — push and bell notifications will be delivered as soon as possible, 'delayed' — push and
     *        bell notifications will be delivered in the most comfortable time for the user, 'delayed_push' — only push
     *        notifications will be delivered in the most comfortable time, while the bell notifications will be delivered
     *        as soon as possible
     *        @see NotificationsSendMessageSendingMode
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function sendMessage(string $access_token, array $params = array()) {
        return $this->request->post('notifications.sendMessage', $access_token, $params);
    }
}
