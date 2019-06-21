<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Notifications {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Notifications constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Returns a list of notifications about other users' feedback to the current user's wall posts.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer count: Number of notifications to return.
	 * - @var string start_from
	 * - @var array[NotificationsFilters] filters: Type of notifications to return: 'wall' — wall posts, 'mentions' — mentions in wall posts, comments, or topics, 'comments' — comments to wall posts, photos, and videos, 'likes' — likes, 'reposted' — wall posts that are copied from the current user's wall, 'followers' — new followers, 'friends' — accepted friend requests
	 * - @var integer start_time: Earliest timestamp (in Unix time) of a notification to return. By default, 24 hours ago.
	 * - @var integer end_time: Latest timestamp (in Unix time) of a notification to return. By default, the current time.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('notifications.get', $access_token, $params);
	}

	/**
	 * Resets the counter of new notifications about other users' feedback to the current user's wall posts.
	 *
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function markAsViewed($access_token) {
		return $this->request->post('notifications.markAsViewed', $access_token);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] user_ids
	 * - @var string message
	 * - @var string fragment
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function sendMessage($access_token, array $params = []) {
		return $this->request->post('notifications.sendMessage', $access_token, $params);
	}
}
