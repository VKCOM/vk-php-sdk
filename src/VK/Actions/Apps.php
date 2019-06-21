<?php
namespace VK\Actions;

use VK\Actions\Enums\AppsFilter;
use VK\Actions\Enums\AppsNameCase;
use VK\Actions\Enums\AppsPlatform;
use VK\Actions\Enums\AppsSort;
use VK\Actions\Enums\AppsType;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiFloodException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Apps {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Apps constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Deletes all request notifications from the current app.
	 *
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function deleteAppRequests($access_token) {
		return $this->request->post('apps.deleteAppRequests', $access_token);
	}

	/**
	 * Returns applications data.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer app_id: Application ID
	 * - @var array[string] app_ids: List of application ID
	 * - @var AppsPlatform platform: platform. Possible values: *'ios' — iOS,, *'android' — Android,, *'winphone' — Windows Phone,, *'web' — приложения на vk.com. By default: 'web'.
	 * - @var boolean extended
	 * - @var boolean return_friends
	 * - @var array[AppsFields] fields: Profile fields to return. Sample values: 'nickname', 'screen_name', 'sex', 'bdate' (birthdate), 'city', 'country', 'timezone', 'photo', 'photo_medium', 'photo_big', 'has_mobile', 'contacts', 'education', 'online', 'counters', 'relation', 'last_seen', 'activity', 'can_write_private_message', 'can_see_all_posts', 'can_post', 'universities', (only if return_friends - 1)
	 * - @var AppsNameCase name_case: Case for declension of user name and surname: 'nom' — nominative (default),, 'gen' — genitive,, 'dat' — dative,, 'acc' — accusative,, 'ins' — instrumental,, 'abl' — prepositional. (only if 'return_friends' = '1')
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('apps.get', $access_token, $params);
	}

	/**
	 * Returns a list of applications (apps) available to users in the App Catalog.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var AppsSort sort: Sort order: 'popular_today' — popular for one day (default), 'visitors' — by visitors number , 'create_date' — by creation date, 'growth_rate' — by growth rate, 'popular_week' — popular for one week
	 * - @var integer offset: Offset required to return a specific subset of apps.
	 * - @var integer count: Number of apps to return.
	 * - @var string platform
	 * - @var boolean extended: '1' — to return additional fields 'screenshots', 'MAU', 'catalog_position', and 'international'. If set, 'count' must be less than or equal to '100'. '0' — not to return additional fields (default).
	 * - @var boolean return_friends
	 * - @var array[AppsFields] fields
	 * - @var string name_case
	 * - @var string q: Search query string.
	 * - @var integer genre_id
	 * - @var AppsFilter filter: 'installed' — to return list of installed apps (only for mobile platform).
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getCatalog($access_token, array $params = []) {
		return $this->request->post('apps.getCatalog', $access_token, $params);
	}

	/**
	 * Creates friends list for requests and invites in current app.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var boolean extended
	 * - @var integer count: List size.
	 * - @var integer offset
	 * - @var AppsType type: List type. Possible values: * 'invite' — available for invites (don't play the game),, * 'request' — available for request (play the game). By default: 'invite'.
	 * - @var array[AppsFields] fields: Additional profile fields, see [vk.com/dev/fields|description].
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getFriendsList($access_token, array $params = []) {
		return $this->request->post('apps.getFriendsList', $access_token, $params);
	}

	/**
	 * Returns players rating in the game.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var AppsType type: Leaderboard type. Possible values: *'level' — by level,, *'points' — by mission points,, *'score' — by score ().
	 * - @var boolean global: Rating type. Possible values: *'1' — global rating among all players,, *'0' — rating among user friends.
	 * - @var boolean extended: 1 — to return additional info about users
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getLeaderboard($access_token, array $params = []) {
		return $this->request->post('apps.getLeaderboard', $access_token, $params);
	}

	/**
	 * Returns scopes for auth
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var AppsType type
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getScopes($access_token, array $params = []) {
		return $this->request->post('apps.getScopes', $access_token, $params);
	}

	/**
	 * Returns user score in app
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getScore($access_token, array $params = []) {
		return $this->request->post('apps.getScore', $access_token, $params);
	}

	/**
	 * Sends a request to another user in an app that uses VK authorization.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: id of the user to send a request
	 * - @var string text: request text
	 * - @var AppsType type: request type. Values: 'invite' – if the request is sent to a user who does not have the app installed,, 'request' – if a user has already installed the app
	 * - @var string name
	 * - @var string key: special string key to be sent with the request
	 * - @var boolean separate
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiFloodException Flood control
	 * @return mixed
	 */
	public function sendRequest($access_token, array $params = []) {
		return $this->request->post('apps.sendRequest', $access_token, $params);
	}
}
