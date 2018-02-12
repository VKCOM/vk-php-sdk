<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\BoardGetTopicsOrder;
use VK\Actions\Enums\BoardGetTopicsPreview;
use VK\Actions\Enums\BoardGetCommentsSort;

class Board {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Board constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a list of topics on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - array topic_ids: IDs of topics to be returned (100 maximum). By default, all topics are returned. If
     *        this parameter is set, the 'order', 'offset', and 'count' parameters are ignored.
     *      - BoardGetTopicsOrder order: Sort order: '1' — by date updated in reverse chronological order. '2'
     *        — by date created in reverse chronological order. '-1' — by date updated in chronological order. '-2'
     *        — by date created in chronological order. If no sort order is specified, topics are returned in the order
     *        specified by the group administrator. Pinned topics are returned first, regardless of the sorting.
     *        @see BoardGetTopicsOrder
     *      - integer offset: Offset needed to return a specific subset of topics.
     *      - integer count: Number of topics to return.
     *      - boolean extended: '1' — to return information about users who created topics or who posted there
     *        last, '0' — to return no additional fields (default)
     *      - BoardGetTopicsPreview preview: '1' — to return the first comment in each topic,, '2' — to return
     *        the last comment in each topic,, '0' — to return no comments. By default: '0'.
     *        @see BoardGetTopicsPreview
     *      - integer preview_length: Number of characters after which to truncate the previewed comment. To
     *        preview the full comment, specify '0'.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getTopics(string $access_token, array $params = array()) {
        return $this->request->post('board.getTopics', $access_token, $params);
    }

    /**
     * Returns a list of comments on a topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     *      - boolean need_likes: '1' — to return the 'likes' field, '0' — not to return the 'likes' field
     *        (default)
     *      - integer start_comment_id:
     *      - integer offset: Offset needed to return a specific subset of comments.
     *      - integer count: Number of comments to return.
     *      - boolean extended: '1' — to return information about users who posted comments, '0' — to return no
     *        additional fields (default)
     *      - BoardGetCommentsSort sort: Sort order: 'asc' — by creation date in chronological order, 'desc' —
     *        by creation date in reverse chronological order,
     *        @see BoardGetCommentsSort
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getComments(string $access_token, array $params = array()) {
        return $this->request->post('board.getComments', $access_token, $params);
    }

    /**
     * Creates a new topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - string title: Topic title.
     *      - string text: Text of the topic.
     *      - boolean from_group: For a community: '1' — to post the topic as by the community, '0' — to post
     *        the topic as by the user (default)
     *      - array attachments: List of media objects attached to the topic, in the following format:
     *        "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media object: 'photo' — photo, 'video' —
     *        video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner. '<media_id>' — Media
     *        ID. Example: "photo100172_166443618,photo66748_265827614", , "NOTE: If you try to attach more than one
     *        reference, an error will be thrown.",
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function addTopic(string $access_token, array $params = array()) {
        return $this->request->post('board.addTopic', $access_token, $params);
    }

    /**
     * Adds a comment on a topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: ID of the topic to be commented on.
     *      - string message: (Required if 'attachments' is not set.) Text of the comment.
     *      - array attachments: (Required if 'text' is not set.) List of media objects attached to the comment, in
     *        the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media object: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner.
     *        '<media_id>' — Media ID.
     *      - boolean from_group: '1' — to post the comment as by the community, '0' — to post the comment as
     *        by the user (default)
     *      - integer sticker_id: Sticker ID.
     *      - string guid: Unique identifier to avoid repeated comments.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function createComment(string $access_token, array $params = array()) {
        return $this->request->post('board.createComment', $access_token, $params);
    }

    /**
     * Deletes a topic from a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteTopic(string $access_token, array $params = array()) {
        return $this->request->post('board.deleteTopic', $access_token, $params);
    }

    /**
     * Edits the title of a topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     *      - string title: New title of the topic.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function editTopic(string $access_token, array $params = array()) {
        return $this->request->post('board.editTopic', $access_token, $params);
    }

    /**
     * Edits a comment on a topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     *      - integer comment_id: ID of the comment on the topic.
     *      - string message: (Required if 'attachments' is not set). New comment text.
     *      - array attachments: (Required if 'message' is not set.) List of media objects attached to the comment,
     *        in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media object: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner.
     *        '<media_id>' — Media ID. Example: "photo100172_166443618,photo66748_265827614"
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function editComment(string $access_token, array $params = array()) {
        return $this->request->post('board.editComment', $access_token, $params);
    }

    /**
     * Restores a comment deleted from a topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     *      - integer comment_id: Comment ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function restoreComment(string $access_token, array $params = array()) {
        return $this->request->post('board.restoreComment', $access_token, $params);
    }

    /**
     * Deletes a comment on a topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     *      - integer comment_id: Comment ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteComment(string $access_token, array $params = array()) {
        return $this->request->post('board.deleteComment', $access_token, $params);
    }

    /**
     * Re-opens a previously closed topic on a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function openTopic(string $access_token, array $params = array()) {
        return $this->request->post('board.openTopic', $access_token, $params);
    }

    /**
     * Closes a topic on a community's discussion board so that comments cannot be posted.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function closeTopic(string $access_token, array $params = array()) {
        return $this->request->post('board.closeTopic', $access_token, $params);
    }

    /**
     * Pins a topic (fixes its place) to the top of a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function fixTopic(string $access_token, array $params = array()) {
        return $this->request->post('board.fixTopic', $access_token, $params);
    }

    /**
     * Unpins a pinned topic from the top of a community's discussion board.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of the community that owns the discussion board.
     *      - integer topic_id: Topic ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function unfixTopic(string $access_token, array $params = array()) {
        return $this->request->post('board.unfixTopic', $access_token, $params);
    }
}
