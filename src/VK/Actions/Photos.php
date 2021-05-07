<?php
namespace VK\Actions;

use VK\Actions\Enums\PhotosReason;
use VK\Actions\Enums\PhotosSort;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiAlbumsLimitException;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\Api\VKApiMessagesDenySendException;
use VK\Exceptions\Api\VKApiParamAlbumIdException;
use VK\Exceptions\Api\VKApiParamHashException;
use VK\Exceptions\Api\VKApiParamPhotosException;
use VK\Exceptions\Api\VKApiParamPhotoException;
use VK\Exceptions\Api\VKApiParamServerException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Photos {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Photos constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Confirms a tag on a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var string photo_id: Photo ID.
	 * - @var integer tag_id: Tag ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function confirmTag($access_token, array $params = []) {
		return $this->request->post('photos.confirmTag', $access_token, $params);
	}

	/**
	 * Allows to copy a photo to the "Saved photos" album
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: photo's owner ID
	 * - @var integer photo_id: photo ID
	 * - @var string access_key: for private photos
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function copy($access_token, array $params = []) {
		return $this->request->post('photos.copy', $access_token, $params);
	}

	/**
	 * Creates an empty photo album.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string title: Album title.
	 * - @var integer group_id: ID of the community in which the album will be created.
	 * - @var string description: Album description.
	 * - @var array[string] privacy_view
	 * - @var array[string] privacy_comment
	 * - @var boolean upload_by_admins_only
	 * - @var boolean comments_disabled
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAlbumsLimitException Albums number limit is reached
	 * @return mixed
	 */
	public function createAlbum($access_token, array $params = []) {
		return $this->request->post('photos.createAlbum', $access_token, $params);
	}

	/**
	 * Adds a new comment on the photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var string message: Comment text.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of objects attached to the post, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — Media attachment owner ID. '<media_id>' — Media attachment ID. Example: "photo100172_166443618,photo66748_265827614"
	 * - @var boolean from_group: '1' — to post a comment from the community
	 * - @var integer reply_to_comment
	 * - @var integer sticker_id
	 * - @var string access_key
	 * - @var string guid
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function createComment($access_token, array $params = []) {
		return $this->request->post('photos.createComment', $access_token, $params);
	}

	/**
	 * Deletes a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function delete($access_token, array $params = []) {
		return $this->request->post('photos.delete', $access_token, $params);
	}

	/**
	 * Deletes a photo album belonging to the current user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer album_id: Album ID.
	 * - @var integer group_id: ID of the community that owns the album.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamAlbumIdException Invalid album id
	 * @return mixed
	 */
	public function deleteAlbum($access_token, array $params = []) {
		return $this->request->post('photos.deleteAlbum', $access_token, $params);
	}

	/**
	 * Deletes a comment on the photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer comment_id: Comment ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function deleteComment($access_token, array $params = []) {
		return $this->request->post('photos.deleteComment', $access_token, $params);
	}

	/**
	 * Edits the caption of a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var string caption: New caption for the photo. If this parameter is not set, it is considered to be equal to an empty string.
	 * - @var number latitude
	 * - @var number longitude
	 * - @var string place_str
	 * - @var string foursquare_id
	 * - @var boolean delete_place
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function edit($access_token, array $params = []) {
		return $this->request->post('photos.edit', $access_token, $params);
	}

	/**
	 * Edits information about a photo album.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer album_id: ID of the photo album to be edited.
	 * - @var string title: New album title.
	 * - @var string description: New album description.
	 * - @var integer owner_id: ID of the user or community that owns the album.
	 * - @var array[string] privacy_view
	 * - @var array[string] privacy_comment
	 * - @var boolean upload_by_admins_only
	 * - @var boolean comments_disabled
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamAlbumIdException Invalid album id
	 * @return mixed
	 */
	public function editAlbum($access_token, array $params = []) {
		return $this->request->post('photos.editAlbum', $access_token, $params);
	}

	/**
	 * Edits a comment on a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer comment_id: Comment ID.
	 * - @var string message: New text of the comment.
	 * - @var array[string] attachments: (Required if 'message' is not set.) List of objects attached to the post, in the following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — Media attachment owner ID. '<media_id>' — Media attachment ID. Example: "photo100172_166443618,photo66748_265827614"
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function editComment($access_token, array $params = []) {
		return $this->request->post('photos.editComment', $access_token, $params);
	}

	/**
	 * Returns a list of a user's or community's photos.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photos. Use a negative value to designate a community ID.
	 * - @var string album_id: Photo album ID. To return information about photos from service albums, use the following string values: 'profile, wall, saved'.
	 * - @var array[string] photo_ids: Photo IDs.
	 * - @var boolean rev: Sort order: '1' — reverse chronological, '0' — chronological
	 * - @var boolean extended: '1' — to return additional 'likes', 'comments', and 'tags' fields, '0' — (default)
	 * - @var string feed_type: Type of feed obtained in 'feed' field of the method.
	 * - @var integer feed: unixtime, that can be obtained with [vk.com/dev/newsfeed.get|newsfeed.get] method in date field to get all photos uploaded by the user on a specific day, or photos the user has been tagged on. Also, 'uid' parameter of the user the event happened with shall be specified.
	 * - @var boolean photo_sizes: '1' — to return photo sizes in a [vk.com/dev/photo_sizes|special format]
	 * - @var integer offset
	 * - @var integer count
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('photos.get', $access_token, $params);
	}

	/**
	 * Returns a list of a user's or community's photo albums.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the albums.
	 * - @var array[integer] album_ids: Album IDs.
	 * - @var integer offset: Offset needed to return a specific subset of albums.
	 * - @var integer count: Number of albums to return.
	 * - @var boolean need_system: '1' — to return system albums with negative IDs
	 * - @var boolean need_covers: '1' — to return an additional 'thumb_src' field, '0' — (default)
	 * - @var boolean photo_sizes: '1' — to return photo sizes in a
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getAlbums($access_token, array $params = []) {
		return $this->request->post('photos.getAlbums', $access_token, $params);
	}

	/**
	 * Returns the number of photo albums belonging to a user or community.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * - @var integer group_id: Community ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getAlbumsCount($access_token, array $params = []) {
		return $this->request->post('photos.getAlbumsCount', $access_token, $params);
	}

	/**
	 * Returns a list of photos belonging to a user or community, in reverse chronological order.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of a user or community that owns the photos. Use a negative value to designate a community ID.
	 * - @var boolean extended: '1' — to return detailed information about photos
	 * - @var integer offset: Offset needed to return a specific subset of photos. By default, '0'.
	 * - @var integer count: Number of photos to return.
	 * - @var boolean photo_sizes: '1' – to return image sizes in [vk.com/dev/photo_sizes|special format].
	 * - @var boolean no_service_albums: '1' – to return photos only from standard albums, '0' – to return all photos including those in service albums, e.g., 'My wall photos' (default)
	 * - @var boolean need_hidden: '1' – to show information about photos being hidden from the block above the wall.
	 * - @var boolean skip_hidden: '1' – not to return photos being hidden from the block above the wall. Works only with owner_id>0, no_service_albums is ignored.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiBlockedException Content blocked
	 * @return mixed
	 */
	public function getAll($access_token, array $params = []) {
		return $this->request->post('photos.getAll', $access_token, $params);
	}

	/**
	 * Returns a list of comments on a specific photo album or all albums of the user sorted in reverse chronological order.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the album(s).
	 * - @var integer album_id: Album ID. If the parameter is not set, comments on all of the user's albums will be returned.
	 * - @var boolean need_likes: '1' — to return an additional 'likes' field, '0' — (default)
	 * - @var integer offset: Offset needed to return a specific subset of comments. By default, '0'.
	 * - @var integer count: Number of comments to return. By default, '20'. Maximum value, '100'.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamAlbumIdException Invalid album id
	 * @return mixed
	 */
	public function getAllComments($access_token, array $params = []) {
		return $this->request->post('photos.getAllComments', $access_token, $params);
	}

	/**
	 * Returns information about photos by their IDs.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[string] photos: IDs separated with a comma, that are IDs of users who posted photos and IDs of photos themselves with an underscore character between such IDs. To get information about a photo in the group album, you shall specify group ID instead of user ID. Example: "1_129207899,6492_135055734, , -20629724_271945303"
	 * - @var boolean extended: '1' — to return additional fields, '0' — (default)
	 * - @var boolean photo_sizes: '1' — to return photo sizes in a
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getById($access_token, array $params = []) {
		return $this->request->post('photos.getById', $access_token, $params);
	}

	/**
	 * Returns an upload link for chat cover pictures.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer chat_id: ID of the chat for which you want to upload a cover photo.
	 * - @var integer crop_x
	 * - @var integer crop_y
	 * - @var integer crop_width: Width (in pixels) of the photo after cropping.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getChatUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getChatUploadServer', $access_token, $params);
	}

	/**
	 * Returns a list of comments on a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var boolean need_likes: '1' — to return an additional 'likes' field, '0' — (default)
	 * - @var integer start_comment_id
	 * - @var integer offset: Offset needed to return a specific subset of comments. By default, '0'.
	 * - @var integer count: Number of comments to return.
	 * - @var PhotosSort sort: Sort order: 'asc' — old first, 'desc' — new first
	 * - @var string access_key
	 * - @var boolean extended
	 * - @var array[PhotosFields] fields
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getComments($access_token, array $params = []) {
		return $this->request->post('photos.getComments', $access_token, $params);
	}

	/**
	 * Returns the server address for market album photo upload.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getMarketAlbumUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getMarketAlbumUploadServer', $access_token, $params);
	}

	/**
	 * Returns the server address for market photo upload.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID.
	 * - @var boolean main_photo: '1' if you want to upload the main item photo.
	 * - @var integer crop_x: X coordinate of the crop left upper corner.
	 * - @var integer crop_y: Y coordinate of the crop left upper corner.
	 * - @var integer crop_width: Width of the cropped photo in px.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getMarketUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getMarketUploadServer', $access_token, $params);
	}

	/**
	 * Returns the server address for photo upload in a private message for a user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'Chat ID', e.g. '2000000001'. For community: '- Community ID', e.g. '-12345'. "
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesDenySendException Can't send messages for users without permission
	 * @return mixed
	 */
	public function getMessagesUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getMessagesUploadServer', $access_token, $params);
	}

	/**
	 * Returns a list of photos with tags that have not been viewed.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of photos.
	 * - @var integer count: Number of photos to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getNewTags($access_token, array $params = []) {
		return $this->request->post('photos.getNewTags', $access_token, $params);
	}

	/**
	 * Returns the server address for owner cover upload.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of community that owns the album (if the photo will be uploaded to a community album).
	 * - @var integer crop_x: X coordinate of the left-upper corner
	 * - @var integer crop_y: Y coordinate of the left-upper corner
	 * - @var integer crop_x2: X coordinate of the right-bottom corner
	 * - @var integer crop_y2: Y coordinate of the right-bottom corner
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getOwnerCoverPhotoUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getOwnerCoverPhotoUploadServer', $access_token, $params);
	}

	/**
	 * Returns an upload server address for a profile or community photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: identifier of a community or current user. "Note that community id must be negative. 'owner_id=1' – user, 'owner_id=-1' – community, "
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getOwnerPhotoUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getOwnerPhotoUploadServer', $access_token, $params);
	}

	/**
	 * Returns a list of tags on a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var string access_key
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getTags($access_token, array $params = []) {
		return $this->request->post('photos.getTags', $access_token, $params);
	}

	/**
	 * Returns the server address for photo upload.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of community that owns the album (if the photo will be uploaded to a community album).
	 * - @var integer album_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getUploadServer', $access_token, $params);
	}

	/**
	 * Returns a list of photos in which a user is tagged.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * - @var integer offset: Offset needed to return a specific subset of photos. By default, '0'.
	 * - @var integer count: Number of photos to return. Maximum value is 1000.
	 * - @var boolean extended: '1' — to return an additional 'likes' field, '0' — (default)
	 * - @var string sort: Sort order: '1' — by date the tag was added in ascending order, '0' — by date the tag was added in descending order
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getUserPhotos($access_token, array $params = []) {
		return $this->request->post('photos.getUserPhotos', $access_token, $params);
	}

	/**
	 * Returns the server address for photo upload onto a user's wall.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of community to whose wall the photo will be uploaded.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getWallUploadServer($access_token, array $params = []) {
		return $this->request->post('photos.getWallUploadServer', $access_token, $params);
	}

	/**
	 * Makes a photo into an album cover.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var integer album_id: Album ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function makeCover($access_token, array $params = []) {
		return $this->request->post('photos.makeCover', $access_token, $params);
	}

	/**
	 * Moves a photo from one album to another.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer target_album_id: ID of the album to which the photo will be moved.
	 * - @var integer photo_id: Photo ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function move($access_token, array $params = []) {
		return $this->request->post('photos.move', $access_token, $params);
	}

	/**
	 * Adds a tag on the photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var integer user_id: ID of the user to be tagged.
	 * - @var number x: Upper left-corner coordinate of the tagged area (as a percentage of the photo's width).
	 * - @var number y: Upper left-corner coordinate of the tagged area (as a percentage of the photo's height).
	 * - @var number x2: Lower right-corner coordinate of the tagged area (as a percentage of the photo's width).
	 * - @var number y2: Lower right-corner coordinate of the tagged area (as a percentage of the photo's height).
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function putTag($access_token, array $params = []) {
		return $this->request->post('photos.putTag', $access_token, $params);
	}

	/**
	 * Removes a tag from a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var integer tag_id: Tag ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeTag($access_token, array $params = []) {
		return $this->request->post('photos.removeTag', $access_token, $params);
	}

	/**
	 * Reorders the album in the list of user albums.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the album.
	 * - @var integer album_id: Album ID.
	 * - @var integer before: ID of the album before which the album in question shall be placed.
	 * - @var integer after: ID of the album after which the album in question shall be placed.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function reorderAlbums($access_token, array $params = []) {
		return $this->request->post('photos.reorderAlbums', $access_token, $params);
	}

	/**
	 * Reorders the photo in the list of photos of the user album.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var integer before: ID of the photo before which the photo in question shall be placed.
	 * - @var integer after: ID of the photo after which the photo in question shall be placed.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamPhotosException Invalid photos
	 * @return mixed
	 */
	public function reorderPhotos($access_token, array $params = []) {
		return $this->request->post('photos.reorderPhotos', $access_token, $params);
	}

	/**
	 * Reports (submits a complaint about) a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * - @var PhotosReason reason: Reason for the complaint: '0' – spam, '1' – child pornography, '2' – extremism, '3' – violence, '4' – drug propaganda, '5' – adult material, '6' – insult, abuse
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function report($access_token, array $params = []) {
		return $this->request->post('photos.report', $access_token, $params);
	}

	/**
	 * Reports (submits a complaint about) a comment on a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer comment_id: ID of the comment being reported.
	 * - @var PhotosReason reason: Reason for the complaint: '0' – spam, '1' – child pornography, '2' – extremism, '3' – violence, '4' – drug propaganda, '5' – adult material, '6' – insult, abuse
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function reportComment($access_token, array $params = []) {
		return $this->request->post('photos.reportComment', $access_token, $params);
	}

	/**
	 * Restores a deleted photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer photo_id: Photo ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function restore($access_token, array $params = []) {
		return $this->request->post('photos.restore', $access_token, $params);
	}

	/**
	 * Restores a deleted comment on a photo.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: ID of the user or community that owns the photo.
	 * - @var integer comment_id: ID of the deleted comment.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function restoreComment($access_token, array $params = []) {
		return $this->request->post('photos.restoreComment', $access_token, $params);
	}

	/**
	 * Saves photos after successful uploading.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer album_id: ID of the album to save photos to.
	 * - @var integer group_id: ID of the community to save photos to.
	 * - @var integer server: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var string photos_list: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var number latitude: Geographical latitude, in degrees (from '-90' to '90').
	 * - @var number longitude: Geographical longitude, in degrees (from '-180' to '180').
	 * - @var string caption: Text describing the photo. 2048 digits max.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamAlbumIdException Invalid album id
	 * @throws VKApiParamServerException Invalid server
	 * @throws VKApiParamHashException Invalid hash
	 * @return mixed
	 */
	public function save($access_token, array $params = []) {
		return $this->request->post('photos.save', $access_token, $params);
	}

	/**
	 * Saves market album photos after successful uploading.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID.
	 * - @var string photo: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var integer server: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamHashException Invalid hash
	 * @throws VKApiParamPhotoException Invalid photo
	 * @return mixed
	 */
	public function saveMarketAlbumPhoto($access_token, array $params = []) {
		return $this->request->post('photos.saveMarketAlbumPhoto', $access_token, $params);
	}

	/**
	 * Saves market photos after successful uploading.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Community ID.
	 * - @var string photo: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var integer server: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var string crop_data: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var string crop_hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamHashException Invalid hash
	 * @throws VKApiParamPhotoException Invalid photo
	 * @return mixed
	 */
	public function saveMarketPhoto($access_token, array $params = []) {
		return $this->request->post('photos.saveMarketPhoto', $access_token, $params);
	}

	/**
	 * Saves a photo after being successfully uploaded. URL obtained with [vk.com/dev/photos.getMessagesUploadServer|photos.getMessagesUploadServer] method.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string photo: Parameter returned when the photo is [vk.com/dev/upload_files|uploaded to the server].
	 * - @var integer server
	 * - @var string hash
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamAlbumIdException Invalid album id
	 * @throws VKApiParamServerException Invalid server
	 * @throws VKApiParamHashException Invalid hash
	 * @return mixed
	 */
	public function saveMessagesPhoto($access_token, array $params = []) {
		return $this->request->post('photos.saveMessagesPhoto', $access_token, $params);
	}

	/**
	 * Saves cover photo after successful uploading.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * - @var string photo: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamPhotoException Invalid photo
	 * @return mixed
	 */
	public function saveOwnerCoverPhoto($access_token, array $params = []) {
		return $this->request->post('photos.saveOwnerCoverPhoto', $access_token, $params);
	}

	/**
	 * Saves a profile or community photo. Upload URL can be got with the [vk.com/dev/photos.getOwnerPhotoUploadServer|photos.getOwnerPhotoUploadServer] method.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string server: parameter returned after [vk.com/dev/upload_files|photo upload].
	 * - @var string hash: parameter returned after [vk.com/dev/upload_files|photo upload].
	 * - @var string photo: parameter returned after [vk.com/dev/upload_files|photo upload].
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamPhotoException Invalid photo
	 * @return mixed
	 */
	public function saveOwnerPhoto($access_token, array $params = []) {
		return $this->request->post('photos.saveOwnerPhoto', $access_token, $params);
	}

	/**
	 * Saves a photo to a user's or community's wall after being uploaded.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: ID of the user on whose wall the photo will be saved.
	 * - @var integer group_id: ID of community on whose wall the photo will be saved.
	 * - @var string photo: Parameter returned when the the photo is [vk.com/dev/upload_files|uploaded to the server].
	 * - @var integer server
	 * - @var string hash
	 * - @var number latitude: Geographical latitude, in degrees (from '-90' to '90').
	 * - @var number longitude: Geographical longitude, in degrees (from '-180' to '180').
	 * - @var string caption: Text describing the photo. 2048 digits max.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamAlbumIdException Invalid album id
	 * @throws VKApiParamServerException Invalid server
	 * @throws VKApiParamHashException Invalid hash
	 * @return mixed
	 */
	public function saveWallPhoto($access_token, array $params = []) {
		return $this->request->post('photos.saveWallPhoto', $access_token, $params);
	}

	/**
	 * Returns a list of photos.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string q: Search query string.
	 * - @var number lat: Geographical latitude, in degrees (from '-90' to '90').
	 * - @var number long: Geographical longitude, in degrees (from '-180' to '180').
	 * - @var integer start_time
	 * - @var integer end_time
	 * - @var integer sort: Sort order:
	 * - @var integer offset: Offset needed to return a specific subset of photos.
	 * - @var integer count: Number of photos to return.
	 * - @var integer radius: Radius of search in meters (works very approximately). Available values: '10', '100', '800', '6000', '50000'.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function search($access_token, array $params = []) {
		return $this->request->post('photos.search', $access_token, $params);
	}
}
