<?php
namespace VK\Actions;

use VK\Actions\Enums\BoardOrder;
use VK\Actions\Enums\BoardPreview;
use VK\Actions\Enums\BoardSort;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Board {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Board constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Creates a new topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var string title: Topic title.
	 * - @var string text: Text of the topic.
	 * - @var boolean from_group: For a community: '1' — to post the topic as by the community, '0' — to post the topic as by the user (default)
	 * - @var array[string] attachments: List of media objects attached to the topic, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media object: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner. '<media_id>' — Media ID. Example: "photo100172_166443618,photo66748_265827614", , "NOTE: If you try to attach more than one reference, an error will be thrown.",
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addTopic($access_token, array $params = []) {
		return $this->request->post('board.addTopic', $access_token, $params);
	}

	/**
	 * Closes a topic on a community's discussion board so that comments cannot be posted.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function closeTopic($access_token, array $params = []) {
		return $this->request->post('board.closeTopic', $access_token, $params);
	}

	/**
	 * Adds a comment on a topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: ID of the topic to be commented on.
	 * - @var string message: (Required if 'attachments' is not set.) Text of the comment.
	 * - @var array[string] attachments: (Required if 'text' is not set.) List of media objects attached to the comment, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media object: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner. '<media_id>' — Media ID.
	 * - @var boolean from_group: '1' — to post the comment as by the community, '0' — to post the comment as by the user (default)
	 * - @var integer sticker_id: Sticker ID.
	 * - @var string guid: Unique identifier to avoid repeated comments.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function createComment($access_token, array $params = []) {
		return $this->request->post('board.createComment', $access_token, $params);
	}

	/**
	 * Deletes a comment on a topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * - @var integer comment_id: Comment ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function deleteComment($access_token, array $params = []) {
		return $this->request->post('board.deleteComment', $access_token, $params);
	}

	/**
	 * Deletes a topic from a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function deleteTopic($access_token, array $params = []) {
		return $this->request->post('board.deleteTopic', $access_token, $params);
	}

	/**
	 * Edits a comment on a topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * - @var integer comment_id: ID of the comment on the topic.
	 * - @var string message: (Required if 'attachments' is not set). New comment text.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of media objects attached to the comment, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media object: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner. '<media_id>' — Media ID. Example: "photo100172_166443618,photo66748_265827614"
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function editComment($access_token, array $params = []) {
		return $this->request->post('board.editComment', $access_token, $params);
	}

	/**
	 * Edits the title of a topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * - @var string title: New title of the topic.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function editTopic($access_token, array $params = []) {
		return $this->request->post('board.editTopic', $access_token, $params);
	}

	/**
	 * Pins a topic (fixes its place) to the top of a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function fixTopic($access_token, array $params = []) {
		return $this->request->post('board.fixTopic', $access_token, $params);
	}

	/**
	 * Returns a list of comments on a topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * - @var boolean need_likes: '1' — to return the 'likes' field, '0' — not to return the 'likes' field (default)
	 * - @var integer start_comment_id
	 * - @var integer offset: Offset needed to return a specific subset of comments.
	 * - @var integer count: Number of comments to return.
	 * - @var boolean extended: '1' — to return information about users who posted comments, '0' — to return no additional fields (default)
	 * - @var BoardSort sort: Sort order: 'asc' — by creation date in chronological order, 'desc' — by creation date in reverse chronological order,
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getComments($access_token, array $params = []) {
		return $this->request->post('board.getComments', $access_token, $params);
	}

	/**
	 * Returns a list of topics on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var array[integer] topic_ids: IDs of topics to be returned (100 maximum). By default, all topics are returned. If this parameter is set, the 'order', 'offset', and 'count' parameters are ignored.
	 * - @var BoardOrder order: Sort order: '1' — by date updated in reverse chronological order. '2' — by date created in reverse chronological order. '-1' — by date updated in chronological order. '-2' — by date created in chronological order. If no sort order is specified, topics are returned in the order specified by the group administrator. Pinned topics are returned first, regardless of the sorting.
	 * - @var integer offset: Offset needed to return a specific subset of topics.
	 * - @var integer count: Number of topics to return.
	 * - @var boolean extended: '1' — to return information about users who created topics or who posted there last, '0' — to return no additional fields (default)
	 * - @var BoardPreview preview: '1' — to return the first comment in each topic,, '2' — to return the last comment in each topic,, '0' — to return no comments. By default: '0'.
	 * - @var integer preview_length: Number of characters after which to truncate the previewed comment. To preview the full comment, specify '0'.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getTopics($access_token, array $params = []) {
		return $this->request->post('board.getTopics', $access_token, $params);
	}

	/**
	 * Re-opens a previously closed topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function openTopic($access_token, array $params = []) {
		return $this->request->post('board.openTopic', $access_token, $params);
	}

	/**
	 * Restores a comment deleted from a topic on a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * - @var integer comment_id: Comment ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function restoreComment($access_token, array $params = []) {
		return $this->request->post('board.restoreComment', $access_token, $params);
	}

	/**
	 * Unpins a pinned topic from the top of a community's discussion board.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the discussion board.
	 * - @var integer topic_id: Topic ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function unfixTopic($access_token, array $params = []) {
		return $this->request->post('board.unfixTopic', $access_token, $params);
	}
}
