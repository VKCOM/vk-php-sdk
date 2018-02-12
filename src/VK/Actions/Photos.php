<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\PhotosGetAlbumId;
use VK\Actions\Enums\PhotosReportReason;
use VK\Actions\Enums\PhotosReportCommentReason;
use VK\Actions\Enums\PhotosGetCommentsSort;

class Photos {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Photos constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Creates an empty photo album.
     * 
     * @param $access_token string
     * @param $params array
     *      - string title: Album title.
     *      - integer group_id: ID of the community in which the album will be created.
     *      - string description: Album description.
     *      - array privacy_view:
     *      - array privacy_comment:
     *      - boolean upload_by_admins_only:
     *      - boolean comments_disabled:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function createAlbum(string $access_token, array $params = array()) {
        return $this->request->post('photos.createAlbum', $access_token, $params);
    }

    /**
     * Edits information about a photo album.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer album_id: ID of the photo album to be edited.
     *      - string title: New album title.
     *      - string description: New album description.
     *      - integer owner_id: ID of the user or community that owns the album.
     *      - array privacy_view:
     *      - array privacy_comment:
     *      - boolean upload_by_admins_only:
     *      - boolean comments_disabled:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function editAlbum(string $access_token, array $params = array()) {
        return $this->request->post('photos.editAlbum', $access_token, $params);
    }

    /**
     * Returns a list of a user's or community's photo albums.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the albums.
     *      - array album_ids: Album IDs.
     *      - integer offset: Offset needed to return a specific subset of albums.
     *      - integer count: Number of albums to return.
     *      - boolean need_system: '1' — to return system albums with negative IDs
     *      - boolean need_covers: '1' — to return an additional 'thumb_src' field, '0' — (default)
     *      - boolean photo_sizes: '1' — to return photo sizes in a
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getAlbums(string $access_token, array $params = array()) {
        return $this->request->post('photos.getAlbums', $access_token, $params);
    }

    /**
     * Returns a list of a user's or community's photos.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photos. Use a negative value to designate
     *        a community ID.
     *      - PhotosGetAlbumId album_id: Photo album ID. To return information about photos from service albums,
     *        use the following string values: 'profile, wall, saved'.
     *        @see PhotosGetAlbumId
     *      - array photo_ids: Photo IDs.
     *      - boolean rev: Sort order: '1' — reverse chronological, '0' — chronological
     *      - boolean extended: '1' — to return additional 'likes', 'comments', and 'tags' fields, '0' —
     *        (default)
     *      - string feed_type: Type of feed obtained in 'feed' field of the method.
     *      - integer feed: unixtime, that can be obtained with [vk.com/dev/newsfeed.get|newsfeed.get] method in
     *        date field to get all photos uploaded by the user on a specific day, or photos the user has been tagged on.
     *        Also, 'uid' parameter of the user the event happened with shall be specified.
     *      - boolean photo_sizes: '1' — to return photo sizes in a [vk.com/dev/photo_sizes|special format]
     *      - integer offset:
     *      - integer count:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('photos.get', $access_token, $params);
    }

    /**
     * Returns the number of photo albums belonging to a user or community.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: User ID.
     *      - integer group_id: Community ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getAlbumsCount(string $access_token, array $params = array()) {
        return $this->request->post('photos.getAlbumsCount', $access_token, $params);
    }

    /**
     * Returns information about photos by their IDs.
     * 
     * @param $access_token string
     * @param $params array
     *      - array photos: IDs separated with a comma, that are IDs of users who posted photos and IDs of photos
     *        themselves with an underscore character between such IDs. To get information about a photo in the group
     *        album, you shall specify group ID instead of user ID. Example: "1_129207899,6492_135055734, ,
     *        -20629724_271945303"
     *      - boolean extended: '1' — to return additional fields, '0' — (default)
     *      - boolean photo_sizes: '1' — to return photo sizes in a
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('photos.getById', $access_token, $params);
    }

    /**
     * Returns the server address for photo upload.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer album_id: Album ID.
     *      - integer group_id: ID of community that owns the album (if the photo will be uploaded to a community
     *        album).
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getUploadServer', $access_token, $params);
    }

    /**
     * Returns the server address for owner cover upload.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of community that owns the album (if the photo will be uploaded to a community
     *        album).
     *      - integer crop_x: X coordinate of the left-upper corner
     *      - integer crop_y: Y coordinate of the left-upper corner
     *      - integer crop_x2: X coordinate of the right-bottom corner
     *      - integer crop_y2: Y coordinate of the right-bottom corner
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getOwnerCoverPhotoUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getOwnerCoverPhotoUploadServer', $access_token, $params);
    }

    /**
     * Returns an upload server address for a profile or community photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: identifier of a community or current user. "Note that community id must be
     *        negative. 'owner_id=1' – user, 'owner_id=-1' – community, "
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getOwnerPhotoUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getOwnerPhotoUploadServer', $access_token, $params);
    }

    /**
     * Returns an upload link for chat cover pictures.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer chat_id: ID of the chat for which you want to upload a cover photo.
     *      - integer crop_x: 
     *      - integer crop_y: 
     *      - integer crop_width: Width (in pixels) of the photo after cropping.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getChatUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getChatUploadServer', $access_token, $params);
    }

    /**
     * Returns the server address for market photo upload.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID.
     *      - boolean main_photo: '1' if you want to upload the main item photo.
     *      - integer crop_x: X coordinate of the crop left upper corner.
     *      - integer crop_y: Y coordinate of the crop left upper corner.
     *      - integer crop_width: Width of the cropped photo in px.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getMarketUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getMarketUploadServer', $access_token, $params);
    }

    /**
     * Returns the server address for market album photo upload.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getMarketAlbumUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getMarketAlbumUploadServer', $access_token, $params);
    }

    /**
     * Saves market photos after successful uploading.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID.
     *      - string photo: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - integer server: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - string crop_data: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - string crop_hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function saveMarketPhoto(string $access_token, array $params = array()) {
        return $this->request->post('photos.saveMarketPhoto', $access_token, $params);
    }

    /**
     * Saves cover photo after successful uploading.
     * 
     * @param $access_token string
     * @param $params array
     *      - string photo: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function saveOwnerCoverPhoto(string $access_token, array $params = array()) {
        return $this->request->post('photos.saveOwnerCoverPhoto', $access_token, $params);
    }

    /**
     * Saves market album photos after successful uploading.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID.
     *      - string photo: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - integer server: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function saveMarketAlbumPhoto(string $access_token, array $params = array()) {
        return $this->request->post('photos.saveMarketAlbumPhoto', $access_token, $params);
    }

    /**
     * Saves a profile or community photo. Upload URL can be got with the
     * [vk.com/dev/photos.getOwnerPhotoUploadServer|photos.getOwnerPhotoUploadServer] method.
     * 
     * @param $access_token string
     * @param $params array
     *      - string server: parameter returned after [vk.com/dev/upload_files|photo upload].
     *      - string hash: parameter returned after [vk.com/dev/upload_files|photo upload].
     *      - string photo: parameter returned after [vk.com/dev/upload_files|photo upload].
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function saveOwnerPhoto(string $access_token, array $params = array()) {
        return $this->request->post('photos.saveOwnerPhoto', $access_token, $params);
    }

    /**
     * Saves a photo to a user's or community's wall after being uploaded.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: ID of the user on whose wall the photo will be saved.
     *      - integer group_id: ID of community on whose wall the photo will be saved.
     *      - string photo: Parameter returned when the the photo is [vk.com/dev/upload_files|uploaded to the
     *        server].
     *      - integer server:
     *      - string hash:
     *      - number latitude: Geographical latitude, in degrees (from '-90' to '90').
     *      - number longitude: Geographical longitude, in degrees (from '-180' to '180').
     *      - string caption: Text describing the photo. 2048 digits max.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function saveWallPhoto(string $access_token, array $params = array()) {
        return $this->request->post('photos.saveWallPhoto', $access_token, $params);
    }

    /**
     * Returns the server address for photo upload onto a user's wall.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: ID of community to whose wall the photo will be uploaded.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getWallUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getWallUploadServer', $access_token, $params);
    }

    /**
     * Returns the server address for photo upload in a private message for a user.
     * 
     * @param $access_token string
     * @param $params array
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getMessagesUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('photos.getMessagesUploadServer', $access_token, $params);
    }

    /**
     * Saves a photo after being successfully uploaded. URL obtained with
     * [vk.com/dev/photos.getMessagesUploadServer|photos.getMessagesUploadServer] method.
     * 
     * @param $access_token string
     * @param $params array
     *      - string photo: Parameter returned when the photo is [vk.com/dev/upload_files|uploaded to the server].
     *      - integer server:
     *      - string hash:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function saveMessagesPhoto(string $access_token, array $params = array()) {
        return $this->request->post('photos.saveMessagesPhoto', $access_token, $params);
    }

    /**
     * Reports (submits a complaint about) a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - PhotosReportReason reason: Reason for the complaint: '0' – spam, '1' – child pornography, '2' –
     *        extremism, '3' – violence, '4' – drug propaganda, '5' – adult material, '6' – insult, abuse
     *        @see PhotosReportReason
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function report(string $access_token, array $params = array()) {
        return $this->request->post('photos.report', $access_token, $params);
    }

    /**
     * Reports (submits a complaint about) a comment on a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer comment_id: ID of the comment being reported.
     *      - PhotosReportCommentReason reason: Reason for the complaint: '0' – spam, '1' – child pornography,
     *        '2' – extremism, '3' – violence, '4' – drug propaganda, '5' – adult material, '6' – insult, abuse
     *        @see PhotosReportCommentReason
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function reportComment(string $access_token, array $params = array()) {
        return $this->request->post('photos.reportComment', $access_token, $params);
    }

    /**
     * Returns a list of photos.
     * 
     * @param $access_token string
     * @param $params array
     *      - string q: Search query string.
     *      - number lat: Geographical latitude, in degrees (from '-90' to '90').
     *      - number long: Geographical longitude, in degrees (from '-180' to '180').
     *      - integer start_time: 
     *      - integer end_time: 
     *      - integer sort: Sort order:
     *      - integer offset: Offset needed to return a specific subset of photos.
     *      - integer count: Number of photos to return.
     *      - integer radius: Radius of search in meters (works very approximately). Available values: '10', '100',
     *        '800', '6000', '50000'.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function search(string $access_token, array $params = array()) {
        return $this->request->post('photos.search', $access_token, $params);
    }

    /**
     * Saves photos after successful uploading.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer album_id: ID of the album to save photos to.
     *      - integer group_id: ID of the community to save photos to.
     *      - integer server: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - string photos_list: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     *      - number latitude: Geographical latitude, in degrees (from '-90' to '90').
     *      - number longitude: Geographical longitude, in degrees (from '-180' to '180').
     *      - string caption: Text describing the photo. 2048 digits max.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function save(string $access_token, array $params = array()) {
        return $this->request->post('photos.save', $access_token, $params);
    }

    /**
     * Allows to copy a photo to the "Saved photos" album
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: photo's owner ID
     *      - integer photo_id: photo ID
     *      - string access_key: for private photos
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function copy(string $access_token, array $params = array()) {
        return $this->request->post('photos.copy', $access_token, $params);
    }

    /**
     * Edits the caption of a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - string caption: New caption for the photo. If this parameter is not set, it is considered to be equal
     *        to an empty string.
     *      - number latitude:
     *      - number longitude:
     *      - string place_str:
     *      - string foursquare_id:
     *      - boolean delete_place:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function edit(string $access_token, array $params = array()) {
        return $this->request->post('photos.edit', $access_token, $params);
    }

    /**
     * Moves a photo from one album to another.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer target_album_id: ID of the album to which the photo will be moved.
     *      - integer photo_id: Photo ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function move(string $access_token, array $params = array()) {
        return $this->request->post('photos.move', $access_token, $params);
    }

    /**
     * Makes a photo into an album cover.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - integer album_id: Album ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function makeCover(string $access_token, array $params = array()) {
        return $this->request->post('photos.makeCover', $access_token, $params);
    }

    /**
     * Reorders the album in the list of user albums.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the album.
     *      - integer album_id: Album ID.
     *      - integer before: ID of the album before which the album in question shall be placed.
     *      - integer after: ID of the album after which the album in question shall be placed.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function reorderAlbums(string $access_token, array $params = array()) {
        return $this->request->post('photos.reorderAlbums', $access_token, $params);
    }

    /**
     * Reorders the photo in the list of photos of the user album.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - integer before: ID of the photo before which the photo in question shall be placed.
     *      - integer after: ID of the photo after which the photo in question shall be placed.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function reorderPhotos(string $access_token, array $params = array()) {
        return $this->request->post('photos.reorderPhotos', $access_token, $params);
    }

    /**
     * Returns a list of photos belonging to a user or community, in reverse chronological order.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of a user or community that owns the photos. Use a negative value to designate a
     *        community ID.
     *      - boolean extended: '1' — to return detailed information about photos
     *      - integer offset: Offset needed to return a specific subset of photos. By default, '0'.
     *      - integer count: Number of photos to return.
     *      - boolean photo_sizes: '1' – to return image sizes in [vk.com/dev/photo_sizes|special format].
     *      - boolean no_service_albums: '1' – to return photos only from standard albums, '0' – to return all
     *        photos including those in service albums, e.g., 'My wall photos' (default)
     *      - boolean need_hidden: '1' – to show information about photos being hidden from the block above the
     *        wall.
     *      - boolean skip_hidden: '1' – not to return photos being hidden from the block above the wall. Works
     *        only with owner_id>0, no_service_albums is ignored.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getAll(string $access_token, array $params = array()) {
        return $this->request->post('photos.getAll', $access_token, $params);
    }

    /**
     * Returns a list of photos in which a user is tagged.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: User ID.
     *      - integer offset: Offset needed to return a specific subset of photos. By default, '0'.
     *      - integer count: Number of photos to return. Maximum value is 1000.
     *      - boolean extended: '1' — to return an additional 'likes' field, '0' — (default)
     *      - string sort: Sort order: '1' — by date the tag was added in ascending order, '0' — by date the
     *        tag was added in descending order
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getUserPhotos(string $access_token, array $params = array()) {
        return $this->request->post('photos.getUserPhotos', $access_token, $params);
    }

    /**
     * Deletes a photo album belonging to the current user.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer album_id: Album ID.
     *      - integer group_id: ID of the community that owns the album.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteAlbum(string $access_token, array $params = array()) {
        return $this->request->post('photos.deleteAlbum', $access_token, $params);
    }

    /**
     * Deletes a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function delete(string $access_token, array $params = array()) {
        return $this->request->post('photos.delete', $access_token, $params);
    }

    /**
     * Restores a deleted photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function restore(string $access_token, array $params = array()) {
        return $this->request->post('photos.restore', $access_token, $params);
    }

    /**
     * Confirms a tag on a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - string photo_id: Photo ID.
     *      - integer tag_id: Tag ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function confirmTag(string $access_token, array $params = array()) {
        return $this->request->post('photos.confirmTag', $access_token, $params);
    }

    /**
     * Returns a list of comments on a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - boolean need_likes: '1' — to return an additional 'likes' field, '0' — (default)
     *      - integer start_comment_id:
     *      - integer offset: Offset needed to return a specific subset of comments. By default, '0'.
     *      - integer count: Number of comments to return.
     *      - PhotosGetCommentsSort sort: Sort order: 'asc' — old first, 'desc' — new first
     *        @see PhotosGetCommentsSort
     *      - string access_key:
     *      - boolean extended:
     *      - array fields:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getComments(string $access_token, array $params = array()) {
        return $this->request->post('photos.getComments', $access_token, $params);
    }

    /**
     * Returns a list of comments on a specific photo album or all albums of the user sorted in reverse chronological
     * order.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the album(s).
     *      - integer album_id: Album ID. If the parameter is not set, comments on all of the user's albums will be
     *        returned.
     *      - boolean need_likes: '1' — to return an additional 'likes' field, '0' — (default)
     *      - integer offset: Offset needed to return a specific subset of comments. By default, '0'.
     *      - integer count: Number of comments to return. By default, '20'. Maximum value, '100'.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getAllComments(string $access_token, array $params = array()) {
        return $this->request->post('photos.getAllComments', $access_token, $params);
    }

    /**
     * Adds a new comment on the photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - string message: Comment text.
     *      - array attachments: (Required if 'message' is not set.) List of objects attached to the post, in the
     *        following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — Media attachment owner
     *        ID. '<media_id>' — Media attachment ID. Example: "photo100172_166443618,photo66748_265827614"
     *      - boolean from_group: '1' — to post a comment from the community
     *      - integer reply_to_comment: 
     *      - integer sticker_id:
     *      - string access_key:
     *      - string guid:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function createComment(string $access_token, array $params = array()) {
        return $this->request->post('photos.createComment', $access_token, $params);
    }

    /**
     * Deletes a comment on the photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer comment_id: Comment ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function deleteComment(string $access_token, array $params = array()) {
        return $this->request->post('photos.deleteComment', $access_token, $params);
    }

    /**
     * Restores a deleted comment on a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer comment_id: ID of the deleted comment.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function restoreComment(string $access_token, array $params = array()) {
        return $this->request->post('photos.restoreComment', $access_token, $params);
    }

    /**
     * Edits a comment on a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer comment_id: Comment ID.
     *      - string message: New text of the comment.
     *      - array attachments: (Required if 'message' is not set.) List of objects attached to the post, in the
     *        following format: "<owner_id>_<media_id>,<owner_id>_<media_id>", '' — Type of media attachment: 'photo'
     *        — photo, 'video' — video, 'audio' — audio, 'doc' — document, '<owner_id>' — Media attachment owner
     *        ID. '<media_id>' — Media attachment ID. Example: "photo100172_166443618,photo66748_265827614"
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function editComment(string $access_token, array $params = array()) {
        return $this->request->post('photos.editComment', $access_token, $params);
    }

    /**
     * Returns a list of tags on a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - string access_key:
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getTags(string $access_token, array $params = array()) {
        return $this->request->post('photos.getTags', $access_token, $params);
    }

    /**
     * Adds a tag on the photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - integer user_id: ID of the user to be tagged.
     *      - number x: Upper left-corner coordinate of the tagged area (as a percentage of the photo's width).
     *      - number y: Upper left-corner coordinate of the tagged area (as a percentage of the photo's height).
     *      - number x2: Lower right-corner coordinate of the tagged area (as a percentage of the photo's width).
     *      - number y2: Lower right-corner coordinate of the tagged area (as a percentage of the photo's height).
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function putTag(string $access_token, array $params = array()) {
        return $this->request->post('photos.putTag', $access_token, $params);
    }

    /**
     * Removes a tag from a photo.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user or community that owns the photo.
     *      - integer photo_id: Photo ID.
     *      - integer tag_id: Tag ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function removeTag(string $access_token, array $params = array()) {
        return $this->request->post('photos.removeTag', $access_token, $params);
    }

    /**
     * Returns a list of photos with tags that have not been viewed.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of photos.
     *      - integer count: Number of photos to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getNewTags(string $access_token, array $params = array()) {
        return $this->request->post('photos.getNewTags', $access_token, $params);
    }
}
