<?php
namespace VK\Actions;

use VK\Actions\Enums\WallFilter;
use VK\Actions\Enums\WallReason;
use VK\Actions\Enums\WallSort;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\Api\VKApiWallAccessAddReplyException;
use VK\Exceptions\Api\VKApiWallAccessCommentException;
use VK\Exceptions\Api\VKApiWallAccessPostException;
use VK\Exceptions\Api\VKApiWallAccessRepliesException;
use VK\Exceptions\Api\VKApiWallAddPostException;
use VK\Exceptions\Api\VKApiWallAdsPostLimitReachedException;
use VK\Exceptions\Api\VKApiWallAdsPublishedException;
use VK\Exceptions\Api\VKApiWallLinksForbiddenException;
use VK\Exceptions\Api\VKApiWallReplyOwnerFloodException;
use VK\Exceptions\Api\VKApiWallTooManyRecipientsException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Wall {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Wall constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer post_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function closeComments($access_token, array $params = []) {
		return $this->request->post('wall.closeComments', $access_token, $params);
	}

	/**
	 * Adds a comment to a post on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer post_id: Post ID.
	 * - @var integer from_group: Group ID.
	 * - @var string message: (Required if 'attachments' is not set.) Text of the comment.
	 * - @var integer reply_to_comment: ID of comment to reply.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of media objects attached to the comment, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media ojbect: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner. '<media_id>' — Media ID. For example: "photo100172_166443618,photo66748_265827614"
	 * - @var integer sticker_id: Sticker ID.
	 * - @var string guid: Unique identifier to avoid repeated comments.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessAddReplyException Access to status replies denied
	 * @throws VKApiWallReplyOwnerFloodException Too many replies
	 * @throws VKApiWallLinksForbiddenException Hyperlinks are forbidden
	 * @throws VKApiWallAccessRepliesException Access to post comments denied
	 * @return mixed
	 */
	public function createComment($access_token, array $params = []) {
		return $this->request->post('wall.createComment', $access_token, $params);
	}

	/**
	 * Deletes a post from a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer post_id: ID of the post to be deleted.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 * @return mixed
	 */
	public function delete($access_token, array $params = []) {
		return $this->request->post('wall.delete', $access_token, $params);
	}

	/**
	 * Deletes a comment on a post on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer comment_id: Comment ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessCommentException Access to wall's comment denied
	 * @return mixed
	 */
	public function deleteComment($access_token, array $params = []) {
		return $this->request->post('wall.deleteComment', $access_token, $params);
	}

	/**
	 * Edits a post on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer post_id
	 * - @var boolean friends_only
	 * - @var string message: (Required if 'attachments' is not set.) Text of the post.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of objects attached to the post, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media application owner. '<media_id>' — Media application ID. Example: "photo100172_166443618,photo66748_265827614", May contain a link to an external page to include in the post. Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more than one link is being attached, an error is thrown."
	 * - @var string services
	 * - @var boolean signed
	 * - @var integer publish_date
	 * - @var number lat
	 * - @var number long
	 * - @var integer place_id
	 * - @var boolean mark_as_ads
	 * - @var boolean close_comments
	 * - @var integer poster_bkg_id
	 * - @var integer poster_bkg_owner_id
	 * - @var string poster_bkg_access_hash
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAdsPostLimitReachedException Too many ads posts
	 * @return mixed
	 */
	public function edit($access_token, array $params = []) {
		return $this->request->post('wall.edit', $access_token, $params);
	}

	/**
	 * Allows to edit hidden post.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer post_id: Post ID. Used for publishing of scheduled and suggested posts.
	 * - @var string message: (Required if 'attachments' is not set.) Text of the post.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of objects attached to the post, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'page' — wiki-page, 'note' — note, 'poll' — poll, 'album' — photo album, '<owner_id>' — ID of the media application owner. '<media_id>' — Media application ID. Example: "photo100172_166443618,photo66748_265827614", May contain a link to an external page to include in the post. Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more than one link is being attached, an error will be thrown."
	 * - @var boolean signed: Only for posts in communities with 'from_group' set to '1': '1' — post will be signed with the name of the posting user, '0' — post will not be signed (default)
	 * - @var number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
	 * - @var number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
	 * - @var integer place_id: ID of the location where the user was tagged.
	 * - @var string link_button: Link button ID
	 * - @var string link_title: Link title
	 * - @var string link_image: Link image url
	 * - @var string link_video: Link video ID in format "<owner_id>_<media_id>"
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAdsPostLimitReachedException Too many ads posts
	 * @return mixed
	 */
	public function editAdsStealth($access_token, array $params = []) {
		return $this->request->post('wall.editAdsStealth', $access_token, $params);
	}

	/**
	 * Edits a comment on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer comment_id: Comment ID.
	 * - @var string message: New comment text.
	 * - @var array[string] attachments: List of objects attached to the comment, in the following format: , "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media attachment owner. '<media_id>' — Media attachment ID. For example: "photo100172_166443618,photo66748_265827614"
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function editComment($access_token, array $params = []) {
		return $this->request->post('wall.editComment', $access_token, $params);
	}

	/**
	 * Returns a list of posts on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the wall. By default, current user ID. Use a negative value to designate a community ID.
	 * - @var string domain: User or community short address.
	 * - @var integer offset: Offset needed to return a specific subset of posts.
	 * - @var integer count: Number of posts to return (maximum 100).
	 * - @var WallFilter filter: Filter to apply: 'owner' — posts by the wall owner, 'others' — posts by someone else, 'all' — posts by the wall owner and others (default), 'postponed' — timed posts (only available for calls with an 'access_token'), 'suggests' — suggested posts on a community wall
	 * - @var boolean extended: '1' — to return 'wall', 'profiles', and 'groups' fields, '0' — to return no additional fields (default)
	 * - @var array[WallFields] fields
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiBlockedException Content blocked
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('wall.get', $access_token, $params);
	}

	/**
	 * Returns a list of posts from user or community walls by their IDs.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[string] posts: User or community IDs and post IDs, separated by underscores. Use a negative value to designate a community ID. Example: "93388_21539,93388_20904,2943_4276,-1_1"
	 * - @var boolean extended: '1' — to return user and community objects needed to display posts, '0' — no additional fields are returned (default)
	 * - @var integer copy_history_depth: Sets the number of parent elements to include in the array 'copy_history' that is returned if the post is a repost from another wall.
	 * - @var array[WallFields] fields
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getById($access_token, array $params = []) {
		return $this->request->post('wall.getById', $access_token, $params);
	}

	/**
	 * Returns a list of comments on a post on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer post_id: Post ID.
	 * - @var boolean need_likes: '1' — to return the 'likes' field, '0' — not to return the 'likes' field (default)
	 * - @var integer start_comment_id
	 * - @var integer offset: Offset needed to return a specific subset of comments.
	 * - @var integer count: Number of comments to return (maximum 100).
	 * - @var WallSort sort: Sort order: 'asc' — chronological, 'desc' — reverse chronological
	 * - @var integer preview_length: Number of characters at which to truncate comments when previewed. By default, '90'. Specify '0' if you do not want to truncate comments.
	 * - @var boolean extended
	 * - @var array[WallFields] fields
	 * - @var integer comment_id: Comment ID.
	 * - @var integer thread_items_count: Count items in threads.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessRepliesException Access to post comments denied
	 * @return mixed
	 */
	public function getComments($access_token, array $params = []) {
		return $this->request->post('wall.getComments', $access_token, $params);
	}

	/**
	 * Returns information about reposts of a post on user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. By default, current user ID. Use a negative value to designate a community ID.
	 * - @var integer post_id: Post ID.
	 * - @var integer offset: Offset needed to return a specific subset of reposts.
	 * - @var integer count: Number of reposts to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getReposts($access_token, array $params = []) {
		return $this->request->post('wall.getReposts', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer post_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function openComments($access_token, array $params = []) {
		return $this->request->post('wall.openComments', $access_token, $params);
	}

	/**
	 * Pins the post on wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the wall. By default, current user ID. Use a negative value to designate a community ID.
	 * - @var integer post_id: Post ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function pin($access_token, array $params = []) {
		return $this->request->post('wall.pin', $access_token, $params);
	}

	/**
	 * Adds a new post on a user wall or community wall. Can also be used to publish suggested or scheduled posts.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var boolean friends_only: '1' — post will be available to friends only, '0' — post will be available to all users (default)
	 * - @var boolean from_group: For a community: '1' — post will be published by the community, '0' — post will be published by the user (default)
	 * - @var string message: (Required if 'attachments' is not set.) Text of the post.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of objects attached to the post, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'page' — wiki-page, 'note' — note, 'poll' — poll, 'album' — photo album, '<owner_id>' — ID of the media application owner. '<media_id>' — Media application ID. Example: "photo100172_166443618,photo66748_265827614", May contain a link to an external page to include in the post. Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more than one link is being attached, an error will be thrown."
	 * - @var string services: List of services or websites the update will be exported to, if the user has so requested. Sample values: 'twitter', 'facebook'.
	 * - @var boolean signed: Only for posts in communities with 'from_group' set to '1': '1' — post will be signed with the name of the posting user, '0' — post will not be signed (default)
	 * - @var integer publish_date: Publication date (in Unix time). If used, posting will be delayed until the set time.
	 * - @var number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
	 * - @var number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
	 * - @var integer place_id: ID of the location where the user was tagged.
	 * - @var integer post_id: Post ID. Used for publishing of scheduled and suggested posts.
	 * - @var string guid
	 * - @var boolean mark_as_ads
	 * - @var boolean close_comments
	 * - @var boolean mute_notifications
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAdsPublishedException Advertisement post was recently added
	 * @throws VKApiWallAddPostException Access to adding post denied
	 * @throws VKApiWallTooManyRecipientsException Too many recipients
	 * @throws VKApiWallLinksForbiddenException Hyperlinks are forbidden
	 * @throws VKApiWallAdsPostLimitReachedException Too many ads posts
	 * @return mixed
	 */
	public function post($access_token, array $params = []) {
		return $this->request->post('wall.post', $access_token, $params);
	}

	/**
	 * Allows to create hidden post which will not be shown on the community's wall and can be used for creating an ad with type "Community post".
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var string message: (Required if 'attachments' is not set.) Text of the post.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of objects attached to the post, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'page' — wiki-page, 'note' — note, 'poll' — poll, 'album' — photo album, '<owner_id>' — ID of the media application owner. '<media_id>' — Media application ID. Example: "photo100172_166443618,photo66748_265827614", May contain a link to an external page to include in the post. Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more than one link is being attached, an error will be thrown."
	 * - @var boolean signed: Only for posts in communities with 'from_group' set to '1': '1' — post will be signed with the name of the posting user, '0' — post will not be signed (default)
	 * - @var number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
	 * - @var number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
	 * - @var integer place_id: ID of the location where the user was tagged.
	 * - @var string guid: Unique identifier to avoid duplication the same post.
	 * - @var string link_button: Link button ID
	 * - @var string link_title: Link title
	 * - @var string link_image: Link image url
	 * - @var string link_video: Link video ID in format "<owner_id>_<media_id>"
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAdsPublishedException Advertisement post was recently added
	 * @throws VKApiWallAddPostException Access to adding post denied
	 * @throws VKApiWallTooManyRecipientsException Too many recipients
	 * @throws VKApiWallLinksForbiddenException Hyperlinks are forbidden
	 * @return mixed
	 */
	public function postAdsStealth($access_token, array $params = []) {
		return $this->request->post('wall.postAdsStealth', $access_token, $params);
	}

	/**
	 * Reports (submits a complaint about) a comment on a post on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the wall.
	 * - @var integer comment_id: Comment ID.
	 * - @var WallReason reason: Reason for the complaint: '0' – spam, '1' – child pornography, '2' – extremism, '3' – violence, '4' – drug propaganda, '5' – adult material, '6' – insult, abuse
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function reportComment($access_token, array $params = []) {
		return $this->request->post('wall.reportComment', $access_token, $params);
	}

	/**
	 * Reports (submits a complaint about) a post on a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the wall.
	 * - @var integer post_id: Post ID.
	 * - @var WallReason reason: Reason for the complaint: '0' – spam, '1' – child pornography, '2' – extremism, '3' – violence, '4' – drug propaganda, '5' – adult material, '6' – insult, abuse
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function reportPost($access_token, array $params = []) {
		return $this->request->post('wall.reportPost', $access_token, $params);
	}

	/**
	 * Reposts (copies) an object to a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string object: ID of the object to be reposted on the wall. Example: "wall66748_3675"
	 * - @var string message: Comment to be added along with the reposted object.
	 * - @var integer group_id: Target community ID when reposting to a community.
	 * - @var boolean mark_as_ads
	 * - @var boolean mute_notifications
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAdsPublishedException Advertisement post was recently added
	 * @throws VKApiWallAddPostException Access to adding post denied
	 * @throws VKApiWallAdsPostLimitReachedException Too many ads posts
	 * @return mixed
	 */
	public function repost($access_token, array $params = []) {
		return $this->request->post('wall.repost', $access_token, $params);
	}

	/**
	 * Restores a post deleted from a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID from whose wall the post was deleted. Use a negative value to designate a community ID.
	 * - @var integer post_id: ID of the post to be restored.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 * @throws VKApiWallAddPostException Access to adding post denied
	 * @return mixed
	 */
	public function restore($access_token, array $params = []) {
		return $this->request->post('wall.restore', $access_token, $params);
	}

	/**
	 * Restores a comment deleted from a user wall or community wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer comment_id: Comment ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessCommentException Access to wall's comment denied
	 * @return mixed
	 */
	public function restoreComment($access_token, array $params = []) {
		return $this->request->post('wall.restoreComment', $access_token, $params);
	}

	/**
	 * Allows to search posts on user or community walls.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: user or community id. "Remember that for a community 'owner_id' must be negative."
	 * - @var string domain: user or community screen name.
	 * - @var string query: search query string.
	 * - @var boolean owners_only: '1' – returns only page owner's posts.
	 * - @var integer count: count of posts to return.
	 * - @var integer offset: Offset needed to return a specific subset of posts.
	 * - @var boolean extended: show extended post info.
	 * - @var array[WallFields] fields
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 * @return mixed
	 */
	public function search($access_token, array $params = []) {
		return $this->request->post('wall.search', $access_token, $params);
	}

	/**
	 * Unpins the post on wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the wall. By default, current user ID. Use a negative value to designate a community ID.
	 * - @var integer post_id: Post ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function unpin($access_token, array $params = []) {
		return $this->request->post('wall.unpin', $access_token, $params);
	}
}
