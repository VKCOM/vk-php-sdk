<?php
namespace VK\Actions;

use VK\Actions\Enums\VideoReason;
use VK\Actions\Enums\VideoSort;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiAccessVideoException;
use VK\Exceptions\Api\VKApiAlbumsLimitException;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\Api\VKApiVideoAlreadyAddedException;
use VK\Exceptions\Api\VKApiVideoCommentsClosedException;
use VK\Exceptions\Api\VKApiWallAddPostException;
use VK\Exceptions\Api\VKApiWallAdsPublishedException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Video {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Video constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Adds a video to a user or community page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer target_id: identifier of a user or community to add a video to. Use a negative value to designate a community ID.
	 * - @var integer video_id: Video ID.
	 * - @var integer owner_id: ID of the user or community that owns the video. Use a negative value to designate a community ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @throws VKApiVideoAlreadyAddedException This video is already added
	 * @return mixed
	 */
	public function add($access_token, array $params = []) {
		return $this->request->post('video.add', $access_token, $params);
	}

	/**
	 * Creates an empty album for videos.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID (if the album will be created in a community).
	 * - @var string title: Album title.
	 * - @var array[VideoPrivacy] privacy: new access permissions for the album. Possible values: , *'0' – all users,, *'1' – friends only,, *'2' – friends and friends of friends,, *'3' – "only me".
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @throws VKApiAlbumsLimitException Albums number limit is reached
	 * @return mixed
	 */
	public function addAlbum($access_token, array $params = []) {
		return $this->request->post('video.addAlbum', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer target_id
	 * - @var integer album_id
	 * - @var array[integer] album_ids
	 * - @var integer owner_id
	 * - @var integer video_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @throws VKApiVideoAlreadyAddedException This video is already added
	 * @return mixed
	 */
	public function addToAlbum($access_token, array $params = []) {
		return $this->request->post('video.addToAlbum', $access_token, $params);
	}

	/**
	 * Adds a new comment on a video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer video_id: Video ID.
	 * - @var string message: New comment text.
	 * - @var array[string] attachments: List of objects attached to the comment, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media attachment owner. '<media_id>' — Media attachment ID. Example: "photo100172_166443618,photo66748_265827614"
	 * - @var boolean from_group: '1' — to post the comment from a community name (only if 'owner_id'<0)
	 * - @var integer reply_to_comment
	 * - @var integer sticker_id
	 * - @var string guid
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiVideoCommentsClosedException Comments for this video are closed
	 * @return mixed
	 */
	public function createComment($access_token, array $params = []) {
		return $this->request->post('video.createComment', $access_token, $params);
	}

	/**
	 * Deletes a video from a user or community page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer video_id: Video ID.
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer target_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function delete($access_token, array $params = []) {
		return $this->request->post('video.delete', $access_token, $params);
	}

	/**
	 * Deletes a video album.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID (if the album is owned by a community).
	 * - @var integer album_id: Album ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function deleteAlbum($access_token, array $params = []) {
		return $this->request->post('video.deleteAlbum', $access_token, $params);
	}

	/**
	 * Deletes a comment on a video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer comment_id: ID of the comment to be deleted.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function deleteComment($access_token, array $params = []) {
		return $this->request->post('video.deleteComment', $access_token, $params);
	}

	/**
	 * Edits information about a video on a user or community page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer video_id: Video ID.
	 * - @var string name: New video title.
	 * - @var string desc: New video description.
	 * - @var array[string] privacy_view: Privacy settings in a [vk.com/dev/privacy_setting|special format]. Privacy setting is available for videos uploaded to own profile by user.
	 * - @var array[string] privacy_comment: Privacy settings for comments in a [vk.com/dev/privacy_setting|special format].
	 * - @var boolean no_comments: Disable comments for the group video.
	 * - @var boolean repeat: '1' — to repeat the playback of the video, '0' — to play the video once,
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function edit($access_token, array $params = []) {
		return $this->request->post('video.edit', $access_token, $params);
	}

	/**
	 * Edits the title of a video album.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID (if the album edited is owned by a community).
	 * - @var integer album_id: Album ID.
	 * - @var string title: New album title.
	 * - @var array[VideoPrivacy] privacy: new access permissions for the album. Possible values: , *'0' – all users,, *'1' – friends only,, *'2' – friends and friends of friends,, *'3' – "only me".
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function editAlbum($access_token, array $params = []) {
		return $this->request->post('video.editAlbum', $access_token, $params);
	}

	/**
	 * Edits the text of a comment on a video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer comment_id: Comment ID.
	 * - @var string message: New comment text.
	 * - @var array[string] attachments: List of objects attached to the comment, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — ID of the media attachment owner. '<media_id>' — Media attachment ID. Example: "photo100172_166443618,photo66748_265827614"
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function editComment($access_token, array $params = []) {
		return $this->request->post('video.editComment', $access_token, $params);
	}

	/**
	 * Returns detailed information about videos.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video(s).
	 * - @var array[string] videos: Video IDs, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", Use a negative value to designate a community ID. Example: "-4363_136089719,13245770_137352259"
	 * - @var integer album_id: ID of the album containing the video(s).
	 * - @var integer count: Number of videos to return.
	 * - @var integer offset: Offset needed to return a specific subset of videos.
	 * - @var boolean extended: '1' — to return an extended response with additional fields
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('video.get', $access_token, $params);
	}

	/**
	 * Returns video album info
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: identifier of a user or community to add a video to. Use a negative value to designate a community ID.
	 * - @var integer album_id: Album ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function getAlbumById($access_token, array $params = []) {
		return $this->request->post('video.getAlbumById', $access_token, $params);
	}

	/**
	 * Returns a list of video albums owned by a user or community.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video album(s).
	 * - @var integer offset: Offset needed to return a specific subset of video albums.
	 * - @var integer count: Number of video albums to return.
	 * - @var boolean extended: '1' — to return additional information about album privacy settings for the current user
	 * - @var boolean need_system
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function getAlbums($access_token, array $params = []) {
		return $this->request->post('video.getAlbums', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer target_id
	 * - @var integer owner_id
	 * - @var integer video_id
	 * - @var boolean extended
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function getAlbumsByVideo($access_token, array $params = []) {
		return $this->request->post('video.getAlbumsByVideo', $access_token, $params);
	}

	/**
	 * Returns a list of comments on a video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer video_id: Video ID.
	 * - @var boolean need_likes: '1' — to return an additional 'likes' field
	 * - @var integer start_comment_id
	 * - @var integer offset: Offset needed to return a specific subset of comments.
	 * - @var integer count: Number of comments to return.
	 * - @var VideoSort sort: Sort order: 'asc' — oldest comment first, 'desc' — newest comment first
	 * - @var boolean extended
	 * - @var array[string] fields
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiVideoCommentsClosedException Comments for this video are closed
	 * @return mixed
	 */
	public function getComments($access_token, array $params = []) {
		return $this->request->post('video.getComments', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer target_id
	 * - @var integer album_id
	 * - @var array[integer] album_ids
	 * - @var integer owner_id
	 * - @var integer video_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function removeFromAlbum($access_token, array $params = []) {
		return $this->request->post('video.removeFromAlbum', $access_token, $params);
	}

	/**
	 * Reorders the album in the list of user video albums.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the albums..
	 * - @var integer album_id: Album ID.
	 * - @var integer before: ID of the album before which the album in question shall be placed.
	 * - @var integer after: ID of the album after which the album in question shall be placed.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @throws VKApiNotFoundException Not found
	 * @return mixed
	 */
	public function reorderAlbums($access_token, array $params = []) {
		return $this->request->post('video.reorderAlbums', $access_token, $params);
	}

	/**
	 * Reorders the video in the video album.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer target_id: ID of the user or community that owns the album with videos.
	 * - @var integer album_id: ID of the video album.
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer video_id: ID of the video.
	 * - @var integer before_owner_id: ID of the user or community that owns the video before which the video in question shall be placed.
	 * - @var integer before_video_id: ID of the video before which the video in question shall be placed.
	 * - @var integer after_owner_id: ID of the user or community that owns the video after which the photo in question shall be placed.
	 * - @var integer after_video_id: ID of the video after which the photo in question shall be placed.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @return mixed
	 */
	public function reorderVideos($access_token, array $params = []) {
		return $this->request->post('video.reorderVideos', $access_token, $params);
	}

	/**
	 * Reports (submits a complaint about) a video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer video_id: Video ID.
	 * - @var VideoReason reason: Reason for the complaint: '0' – spam, '1' – child pornography, '2' – extremism, '3' – violence, '4' – drug propaganda, '5' – adult material, '6' – insult, abuse
	 * - @var string comment: Comment describing the complaint.
	 * - @var string search_query: (If the video was found in search results.) Search query string.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function report($access_token, array $params = []) {
		return $this->request->post('video.report', $access_token, $params);
	}

	/**
	 * Reports (submits a complaint about) a comment on a video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer comment_id: ID of the comment being reported.
	 * - @var VideoReason reason: Reason for the complaint: , 0 – spam , 1 – child pornography , 2 – extremism , 3 – violence , 4 – drug propaganda , 5 – adult material , 6 – insult, abuse
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function reportComment($access_token, array $params = []) {
		return $this->request->post('video.reportComment', $access_token, $params);
	}

	/**
	 * Restores a previously deleted video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer video_id: Video ID.
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function restore($access_token, array $params = []) {
		return $this->request->post('video.restore', $access_token, $params);
	}

	/**
	 * Restores a previously deleted comment on a video.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the video.
	 * - @var integer comment_id: ID of the deleted comment.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function restoreComment($access_token, array $params = []) {
		return $this->request->post('video.restoreComment', $access_token, $params);
	}

	/**
	 * Returns a server address (required for upload) and video data.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string name: Name of the video.
	 * - @var string description: Description of the video.
	 * - @var boolean is_private: '1' — to designate the video as private (send it via a private message), the video will not appear on the user's video list and will not be available by ID for other users, '0' — not to designate the video as private
	 * - @var boolean wallpost: '1' — to post the saved video on a user's wall, '0' — not to post the saved video on a user's wall
	 * - @var string link: URL for embedding the video from an external website.
	 * - @var integer group_id: ID of the community in which the video will be saved. By default, the current user's page.
	 * - @var integer album_id: ID of the album to which the saved video will be added.
	 * - @var array[string] privacy_view
	 * - @var array[string] privacy_comment
	 * - @var boolean no_comments
	 * - @var boolean repeat: '1' — to repeat the playback of the video, '0' — to play the video once,
	 * - @var boolean compression
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessVideoException Access denied
	 * @throws VKApiWallAddPostException Access to adding post denied
	 * @throws VKApiWallAdsPublishedException Advertisement post was recently added
	 * @return mixed
	 */
	public function save($access_token, array $params = []) {
		return $this->request->post('video.save', $access_token, $params);
	}

	/**
	 * Returns a list of videos under the set search criterion.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string q: Search query string (e.g., 'The Beatles').
	 * - @var VideoSort sort: Sort order: '1' — by duration, '2' — by relevance, '0' — by date added
	 * - @var integer hd: If not null, only searches for high-definition videos.
	 * - @var boolean adult: '1' — to disable the Safe Search filter, '0' — to enable the Safe Search filter
	 * - @var array[VideoFilters] filters: Filters to apply: 'youtube' — return YouTube videos only, 'vimeo' — return Vimeo videos only, 'short' — return short videos only, 'long' — return long videos only
	 * - @var boolean search_own
	 * - @var integer offset: Offset needed to return a specific subset of videos.
	 * - @var integer longer
	 * - @var integer shorter
	 * - @var integer count: Number of videos to return.
	 * - @var boolean extended
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function search($access_token, array $params = []) {
		return $this->request->post('video.search', $access_token, $params);
	}
}
