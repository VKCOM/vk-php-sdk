<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;
use VK\Actions\Enum\WallGetCommentsSort;
use VK\Actions\Enum\WallReportCommentReason;
use VK\Actions\Enum\WallReportPostReason;

class Wall {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Wall constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - string link:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function checkCopyrightLink(string $access_token, array $params = array()) {
        return $this->request->post('wall.checkCopyrightLink', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer post_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function closeComments(string $access_token, array $params = array()) {
        return $this->request->post('wall.closeComments', $access_token, $params);
    }

    /**
     * Adds a comment to a post on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer post_id: Post ID.
     *      - integer from_group: Group ID.
     *      - string message: (Required if 'attachments' is not set.) Text of the comment.
     *      - integer reply_to_comment: ID of comment to reply.
     *      - array attachments: (Required if 'message' is not set.) List of media objects attached to the comment,
     *        in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media ojbect: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media owner.
     *        '<media_id>' — Media ID. For example: "photo100172_166443618,photo66748_265827614"
     *      - integer sticker_id: Sticker ID.
     *      - string guid: Unique identifier to avoid repeated comments.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function createComment(string $access_token, array $params = array()) {
        return $this->request->post('wall.createComment', $access_token, $params);
    }

    /**
     * Deletes a post from a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer post_id: ID of the post to be deleted.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function delete(string $access_token, array $params = array()) {
        return $this->request->post('wall.delete', $access_token, $params);
    }

    /**
     * Deletes a comment on a post on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer comment_id: Comment ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function deleteComment(string $access_token, array $params = array()) {
        return $this->request->post('wall.deleteComment', $access_token, $params);
    }

    /**
     * Edits a post on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer post_id:
     *      - boolean friends_only:
     *      - string message: (Required if 'attachments' is not set.) Text of the post.
     *      - array attachments: (Required if 'message' is not set.) List of objects attached to the post, in the
     *        following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media
     *        application owner. '<media_id>' — Media application ID. Example:
     *        "photo100172_166443618,photo66748_265827614", May contain a link to an external page to include in the post.
     *        Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more than one link is being attached, an
     *        error is thrown."
     *      - string services:
     *      - boolean signed:
     *      - integer publish_date:
     *      - number lat:
     *      - number long:
     *      - integer place_id:
     *      - boolean mark_as_ads:
     *      - boolean close_comments:
     *      - integer donut_paid_duration:
     *      - integer poster_bkg_id:
     *      - integer poster_bkg_owner_id:
     *      - string poster_bkg_access_hash:
     *      - string copyright:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function edit(string $access_token, array $params = array()) {
        return $this->request->post('wall.edit', $access_token, $params);
    }

    /**
     * Allows to edit hidden post.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer post_id: Post ID. Used for publishing of scheduled and suggested posts.
     *      - string message: (Required if 'attachments' is not set.) Text of the post.
     *      - array attachments: (Required if 'message' is not set.) List of objects attached to the post, in the
     *        following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'page' — wiki-page, 'note' — note,
     *        'poll' — poll, 'album' — photo album, '<owner_id>' — ID of the media application owner. '<media_id>'
     *        — Media application ID. Example: "photo100172_166443618,photo66748_265827614", May contain a link to an
     *        external page to include in the post. Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more
     *        than one link is being attached, an error will be thrown."
     *      - boolean signed: Only for posts in communities with 'from_group' set to '1': '1' — post will be
     *        signed with the name of the posting user, '0' — post will not be signed (default)
     *      - number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
     *      - number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
     *      - integer place_id: ID of the location where the user was tagged.
     *      - string link_button: Link button ID
     *      - string link_title: Link title
     *      - string link_image: Link image url
     *      - string link_video: Link video ID in format "<owner_id>_<media_id>"
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function editAdsStealth(string $access_token, array $params = array()) {
        return $this->request->post('wall.editAdsStealth', $access_token, $params);
    }

    /**
     * Edits a comment on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer comment_id: Comment ID.
     *      - string message: New comment text.
     *      - array attachments: List of objects attached to the comment, in the following format: ,
     *        "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video'
     *        — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media attachment owner.
     *        '<media_id>' — Media attachment ID. For example: "photo100172_166443618,photo66748_265827614"
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function editComment(string $access_token, array $params = array()) {
        return $this->request->post('wall.editComment', $access_token, $params);
    }

    /**
     * Returns a list of posts on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the wall. By default, current user ID. Use a
     *        negative value to designate a community ID.
     *      - string domain: User or community short address.
     *      - integer offset: Offset needed to return a specific subset of posts.
     *      - integer count: Number of posts to return (maximum 100).
     *      - string filter:
     *      - boolean extended: '1' — to return 'wall', 'profiles', and 'groups' fields, '0' — to return no
     *        additional fields (default)
     *      - array fields:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('wall.get', $access_token, $params);
    }

    /**
     * Returns a list of posts from user or community walls by their IDs.
     *
     * @param $access_token string
     * @param $params array
     *      - array posts: User or community IDs and post IDs, separated by underscores. Use a negative value to
     *        designate a community ID. Example: "93388_21539,93388_20904,2943_4276,-1_1"
     *      - boolean extended: '1' — to return user and community objects needed to display posts, '0' — no
     *        additional fields are returned (default)
     *      - integer copy_history_depth: Sets the number of parent elements to include in the array 'copy_history'
     *        that is returned if the post is a repost from another wall.
     *      - array fields:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('wall.getById', $access_token, $params);
    }

    /**
     * Returns a comment on a post on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer comment_id: Comment ID.
     *      - boolean extended:
     *      - array fields:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function getComment(string $access_token, array $params = array()) {
        return $this->request->post('wall.getComment', $access_token, $params);
    }

    /**
     * Returns a list of comments on a post on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer post_id: Post ID.
     *      - boolean need_likes: '1' — to return the 'likes' field, '0' — not to return the 'likes' field
     *        (default)
     *      - integer start_comment_id:
     *      - integer offset: Offset needed to return a specific subset of comments.
     *      - integer count: Number of comments to return (maximum 100).
     *      - WallGetCommentsSort sort: Sort order: 'asc' — chronological, 'desc' — reverse chronological
     *        @see WallGetCommentsSort
     *      - integer preview_length: Number of characters at which to truncate comments when previewed. By
     *        default, '90'. Specify '0' if you do not want to truncate comments.
     *      - boolean extended:
     *      - array fields:
     *      - integer comment_id: Comment ID.
     *      - integer thread_items_count: Count items in threads.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function getComments(string $access_token, array $params = array()) {
        return $this->request->post('wall.getComments', $access_token, $params);
    }

    /**
     * Returns information about reposts of a post on user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. By default, current user ID. Use a negative value to
     *        designate a community ID.
     *      - integer post_id: Post ID.
     *      - integer offset: Offset needed to return a specific subset of reposts.
     *      - integer count: Number of reposts to return.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getReposts(string $access_token, array $params = array()) {
        return $this->request->post('wall.getReposts', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer post_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function openComments(string $access_token, array $params = array()) {
        return $this->request->post('wall.openComments', $access_token, $params);
    }

    /**
     * Pins the post on wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the wall. By default, current user ID. Use a
     *        negative value to designate a community ID.
     *      - integer post_id: Post ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function pin(string $access_token, array $params = array()) {
        return $this->request->post('wall.pin', $access_token, $params);
    }

    /**
     * Adds a new post on a user wall or community wall. Can also be used to publish suggested or scheduled posts.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - boolean friends_only: '1' — post will be available to friends only, '0' — post will be available
     *        to all users (default)
     *      - boolean from_group: For a community: '1' — post will be published by the community, '0' — post
     *        will be published by the user (default)
     *      - string message: (Required if 'attachments' is not set.) Text of the post.
     *      - array attachments: (Required if 'message' is not set.) List of objects attached to the post, in the
     *        following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'page' — wiki-page, 'note' — note,
     *        'poll' — poll, 'album' — photo album, '<owner_id>' — ID of the media application owner. '<media_id>'
     *        — Media application ID. Example: "photo100172_166443618,photo66748_265827614", May contain a link to an
     *        external page to include in the post. Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more
     *        than one link is being attached, an error will be thrown."
     *      - string services: List of services or websites the update will be exported to, if the user has so
     *        requested. Sample values: 'twitter', 'facebook'.
     *      - boolean signed: Only for posts in communities with 'from_group' set to '1': '1' — post will be
     *        signed with the name of the posting user, '0' — post will not be signed (default)
     *      - integer publish_date: Publication date (in Unix time). If used, posting will be delayed until the set
     *        time.
     *      - number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
     *      - number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
     *      - integer place_id: ID of the location where the user was tagged.
     *      - integer post_id: Post ID. Used for publishing of scheduled and suggested posts.
     *      - string guid:
     *      - boolean mark_as_ads:
     *      - boolean close_comments:
     *      - integer donut_paid_duration:
     *      - boolean mute_notifications:
     *      - string copyright:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function post(string $access_token, array $params = array()) {
        return $this->request->post('wall.post', $access_token, $params);
    }

    /**
     * Allows to create hidden post which will not be shown on the community's wall and can be used for creating an ad
     * with type "Community post".
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - string message: (Required if 'attachments' is not set.) Text of the post.
     *      - array attachments: (Required if 'message' is not set.) List of objects attached to the post, in the
     *        following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'page' — wiki-page, 'note' — note,
     *        'poll' — poll, 'album' — photo album, '<owner_id>' — ID of the media application owner. '<media_id>'
     *        — Media application ID. Example: "photo100172_166443618,photo66748_265827614", May contain a link to an
     *        external page to include in the post. Example: "photo66748_265827614,http://habrahabr.ru", "NOTE: If more
     *        than one link is being attached, an error will be thrown."
     *      - boolean signed: Only for posts in communities with 'from_group' set to '1': '1' — post will be
     *        signed with the name of the posting user, '0' — post will not be signed (default)
     *      - number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
     *      - number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
     *      - integer place_id: ID of the location where the user was tagged.
     *      - string guid: Unique identifier to avoid duplication the same post.
     *      - string link_button: Link button ID
     *      - string link_title: Link title
     *      - string link_image: Link image url
     *      - string link_video: Link video ID in format "<owner_id>_<media_id>"
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function postAdsStealth(string $access_token, array $params = array()) {
        return $this->request->post('wall.postAdsStealth', $access_token, $params);
    }

    /**
     * Reports (submits a complaint about) a comment on a post on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the wall.
     *      - integer comment_id: Comment ID.
     *      - WallReportCommentReason reason: Reason for the complaint: '0' - spam, '1' - child pornography, '2' -
     *        extremism, '3' - violence, '4' - drug propaganda, '5' - adult material, '6' - insult, abuse
     *        @see WallReportCommentReason
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function reportComment(string $access_token, array $params = array()) {
        return $this->request->post('wall.reportComment', $access_token, $params);
    }

    /**
     * Reports (submits a complaint about) a post on a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the wall.
     *      - integer post_id: Post ID.
     *      - WallReportPostReason reason: Reason for the complaint: '0' - spam, '1' - child pornography, '2' -
     *        extremism, '3' - violence, '4' - drug propaganda, '5' - adult material, '6' - insult, abuse
     *        @see WallReportPostReason
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function reportPost(string $access_token, array $params = array()) {
        return $this->request->post('wall.reportPost', $access_token, $params);
    }

    /**
     * Reposts (copies) an object to a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - string object: ID of the object to be reposted on the wall. Example: "wall66748_3675"
     *      - string message: Comment to be added along with the reposted object.
     *      - integer group_id: Target community ID when reposting to a community.
     *      - boolean mark_as_ads:
     *      - boolean mute_notifications:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function repost(string $access_token, array $params = array()) {
        return $this->request->post('wall.repost', $access_token, $params);
    }

    /**
     * Restores a post deleted from a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID from whose wall the post was deleted. Use a negative value
     *        to designate a community ID.
     *      - integer post_id: ID of the post to be restored.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function restore(string $access_token, array $params = array()) {
        return $this->request->post('wall.restore', $access_token, $params);
    }

    /**
     * Restores a comment deleted from a user wall or community wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: User ID or community ID. Use a negative value to designate a community ID.
     *      - integer comment_id: Comment ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function restoreComment(string $access_token, array $params = array()) {
        return $this->request->post('wall.restoreComment', $access_token, $params);
    }

    /**
     * Allows to search posts on user or community walls.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: user or community id. "Remember that for a community 'owner_id' must be negative."
     *      - string domain: user or community screen name.
     *      - string query: search query string.
     *      - boolean owners_only: '1' - returns only page owner's posts.
     *      - integer count: count of posts to return.
     *      - integer offset: Offset needed to return a specific subset of posts.
     *      - boolean extended: show extended post info.
     *      - array fields:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function search(string $access_token, array $params = array()) {
        return $this->request->post('wall.search', $access_token, $params);
    }

    /**
     * Unpins the post on wall.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the wall. By default, current user ID. Use a
     *        negative value to designate a community ID.
     *      - integer post_id: Post ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function unpin(string $access_token, array $params = array()) {
        return $this->request->post('wall.unpin', $access_token, $params);
    }
}
