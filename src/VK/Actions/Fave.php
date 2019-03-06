<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Fave {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Fave constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Adds a community to user faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addGroup($access_token, array $params = []) {
		return $this->request->post('fave.addGroup', $access_token, $params);
	}

	/**
	 * Adds a link to user faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string link: Link URL.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addLink($access_token, array $params = []) {
		return $this->request->post('fave.addLink', $access_token, $params);
	}

	/**
	 * Adds a profile to user faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: Profile ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addUser($access_token, array $params = []) {
		return $this->request->post('fave.addUser', $access_token, $params);
	}

	/**
	 * Returns a list of links that the current user has bookmarked.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of users.
	 * - @var integer count: Number of results to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getLinks($access_token, array $params = []) {
		return $this->request->post('fave.getLinks', $access_token, $params);
	}

	/**
	 * Returns market items bookmarked by current user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer count: Number of results to return.
	 * - @var integer offset
	 * - @var boolean extended: '1' – to return additional fields 'likes, can_comment, can_repost, photos'. By default: '0'.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getMarketItems($access_token, array $params = []) {
		return $this->request->post('fave.getMarketItems', $access_token, $params);
	}

	/**
	 * Returns a list of photos that the current user has liked.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of photos.
	 * - @var integer count: Number of photos to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getPhotos($access_token, array $params = []) {
		return $this->request->post('fave.getPhotos', $access_token, $params);
	}

	/**
	 * Returns a list of wall posts that the current user has liked.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of posts.
	 * - @var integer count: Number of posts to return.
	 * - @var boolean extended: '1' — to return additional 'wall', 'profiles', and 'groups' fields. By default: '0'.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getPosts($access_token, array $params = []) {
		return $this->request->post('fave.getPosts', $access_token, $params);
	}

	/**
	 * Returns a list of users whom the current user has bookmarked.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of users.
	 * - @var integer count: Number of users to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getUsers($access_token, array $params = []) {
		return $this->request->post('fave.getUsers', $access_token, $params);
	}

	/**
	 * Returns a list of videos that the current user has liked.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of videos.
	 * - @var integer count: Number of videos to return.
	 * - @var boolean extended: Return an additional information about videos. Also returns all owners profiles and groups.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getVideos($access_token, array $params = []) {
		return $this->request->post('fave.getVideos', $access_token, $params);
	}

	/**
	 * Removes a community from user faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeGroup($access_token, array $params = []) {
		return $this->request->post('fave.removeGroup', $access_token, $params);
	}

	/**
	 * Removes link from the user's faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string link_id: Link ID (can be obtained by [vk.com/dev/faves.getLinks|faves.getLinks] method).
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeLink($access_token, array $params = []) {
		return $this->request->post('fave.removeLink', $access_token, $params);
	}

	/**
	 * Removes a profile from user faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: Profile ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeUser($access_token, array $params = []) {
		return $this->request->post('fave.removeUser', $access_token, $params);
	}
}
