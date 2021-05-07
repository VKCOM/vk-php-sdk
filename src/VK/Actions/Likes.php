<?php
namespace VK\Actions;

use VK\Actions\Enums\LikesFilter;
use VK\Actions\Enums\LikesFriendsOnly;
use VK\Actions\Enums\LikesType;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Likes {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Likes constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Adds the specified object to the 'Likes' list of the current user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var LikesType type: Object type: 'post' — post on user or community wall, 'comment' — comment on a wall post, 'photo' — photo, 'audio' — audio, 'video' — video, 'note' — note, 'photo_comment' — comment on the photo, 'video_comment' — comment on the video, 'topic_comment' — comment in the discussion, 'sitepage' — page of the site where the [vk.com/dev/Like|Like widget] is installed
	 * - @var integer owner_id: ID of the user or community that owns the object.
	 * - @var integer item_id: Object ID.
	 * - @var string access_key: Access key required for an object owned by a private entity.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function add($access_token, array $params = []) {
		return $this->request->post('likes.add', $access_token, $params);
	}

	/**
	 * Deletes the specified object from the 'Likes' list of the current user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var LikesType type: Object type: 'post' — post on user or community wall, 'comment' — comment on a wall post, 'photo' — photo, 'audio' — audio, 'video' — video, 'note' — note, 'photo_comment' — comment on the photo, 'video_comment' — comment on the video, 'topic_comment' — comment in the discussion, 'sitepage' — page of the site where the [vk.com/dev/Like|Like widget] is installed
	 * - @var integer owner_id: ID of the user or community that owns the object.
	 * - @var integer item_id: Object ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function delete($access_token, array $params = []) {
		return $this->request->post('likes.delete', $access_token, $params);
	}

	/**
	 * Returns a list of IDs of users who added the specified object to their 'Likes' list.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var LikesType type: , Object type: 'post' — post on user or community wall, 'comment' — comment on a wall post, 'photo' — photo, 'audio' — audio, 'video' — video, 'note' — note, 'photo_comment' — comment on the photo, 'video_comment' — comment on the video, 'topic_comment' — comment in the discussion, 'sitepage' — page of the site where the [vk.com/dev/Like|Like widget] is installed
	 * - @var integer owner_id: ID of the user, community, or application that owns the object. If the 'type' parameter is set as 'sitepage', the application ID is passed as 'owner_id'. Use negative value for a community id. If the 'type' parameter is not set, the 'owner_id' is assumed to be either the current user or the same application ID as if the 'type' parameter was set to 'sitepage'.
	 * - @var integer item_id: Object ID. If 'type' is set as 'sitepage', 'item_id' can include the 'page_id' parameter value used during initialization of the [vk.com/dev/Like|Like widget].
	 * - @var string page_url: URL of the page where the [vk.com/dev/Like|Like widget] is installed. Used instead of the 'item_id' parameter.
	 * - @var LikesFilter filter: Filters to apply: 'likes' — returns information about all users who liked the object (default), 'copies' — returns information only about users who told their friends about the object
	 * - @var LikesFriendsOnly friends_only: Specifies which users are returned: '1' — to return only the current user's friends, '0' — to return all users (default)
	 * - @var boolean extended: Specifies whether extended information will be returned. '1' — to return extended information about users and communities from the 'Likes' list, '0' — to return no additional information (default)
	 * - @var integer offset: Offset needed to select a specific subset of users.
	 * - @var integer count: Number of user IDs to return (maximum '1000'). Default is '100' if 'friends_only' is set to '0', otherwise, the default is '10' if 'friends_only' is set to '1'.
	 * - @var boolean skip_own
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getList($access_token, array $params = []) {
		return $this->request->post('likes.getList', $access_token, $params);
	}

	/**
	 * Checks for the object in the 'Likes' list of the specified user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * - @var LikesType type: Object type: 'post' — post on user or community wall, 'comment' — comment on a wall post, 'photo' — photo, 'audio' — audio, 'video' — video, 'note' — note, 'photo_comment' — comment on the photo, 'video_comment' — comment on the video, 'topic_comment' — comment in the discussion
	 * - @var integer owner_id: ID of the user or community that owns the object.
	 * - @var integer item_id: Object ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function isLiked($access_token, array $params = []) {
		return $this->request->post('likes.isLiked', $access_token, $params);
	}
}
