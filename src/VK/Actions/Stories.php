<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\VKApiStoryExpiredException;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\Api\VKApiMessagesUserBlockedException;
use VK\Exceptions\Api\VKApiIncorrectReplyPrivacyException;
use VK\Actions\Enums\StoriesGetPhotoUploadServerLinkText;

class Stories {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Stories constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Allows to hide stories from chosen sources from current user's feed.
     *
     * @param $access_token string
     * @param $params array
     *      - array owners_ids: List of sources IDs
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function banOwner(string $access_token, array $params = array()) {
        return $this->request->post('stories.banOwner', $access_token, $params);
    }

    /**
     * Allows to delete story.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: Story owner's ID. Current user id is used by default.
     *      - integer story_id: Story ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function delete(string $access_token, array $params = array()) {
        return $this->request->post('stories.delete', $access_token, $params);
    }

    /**
     * Returns stories available for current user.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: Owner ID.
     *      - boolean extended: '1' — to return additional fields for users and communities. Default value is 0.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('stories.get', $access_token, $params);
    }

    /**
     * Returns list of sources hidden from current user's feed.
     *
     * @param $access_token string
     * @param $params array
     *      - array fields: Additional fields to return
     *      - boolean extended: '1' — to return additional fields for users and communities. Default value is 0.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getBanned(string $access_token, array $params = array()) {
        return $this->request->post('stories.getBanned', $access_token, $params);
    }

    /**
     * Returns story by its ID.
     *
     * @param $access_token string
     * @param $params array
     *      - array stories: Stories IDs separated by commas. Use format {owner_id}+'_'+{story_id}, for example,
     *        12345_54331.
     *      - boolean extended: '1' — to return additional fields for users and communities. Default value is 0.
     *      - array fields: Additional fields to return
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws VKApiStoryExpiredException Story has already expired
     *
     */
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('stories.getById', $access_token, $params);
    }

    /**
     * Returns URL for uploading a story with photo.
     *
     * @param $access_token string
     * @param $params array
     *      - boolean add_to_news: 1 — to add the story to friend's feed.
     *      - array user_ids: List of users IDs who can see the story.
     *      - string reply_to_story: ID of the story to reply with the current.
     *      - StoriesGetPhotoUploadServerLinkText link_text: Link text (for community's stories only).
     *        @see StoriesGetPhotoUploadServerLinkText
     *      - string link_url: Link URL. Internal links on https://vk.com only.
     *      - integer group_id: ID of the community to upload the story (should be verified or with the "fire"
     *        icon).
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws VKApiBlockedException Content blocked
     * @throws VKApiMessagesUserBlockedException Can't send messages for users from blacklist
     * @throws VKApiIncorrectReplyPrivacyException Incorrect reply privacy
     *
     */
    public function getPhotoUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('stories.getPhotoUploadServer', $access_token, $params);
    }

    /**
     * Returns replies to the story.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: Story owner ID.
     *      - integer story_id: Story ID.
     *      - string access_key: Access key for the private object.
     *      - boolean extended: '1' — to return additional fields for users and communities. Default value is 0.
     *      - array fields: Additional fields to return
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getReplies(string $access_token, array $params = array()) {
        return $this->request->post('stories.getReplies', $access_token, $params);
    }

    /**
     * Returns stories available for current user.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: Story owner ID. 
     *      - integer story_id: Story ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getStats(string $access_token, array $params = array()) {
        return $this->request->post('stories.getStats', $access_token, $params);
    }

    /**
     * Allows to receive URL for uploading story with video.
     *
     * @param $access_token string
     * @param $params array
     *      - boolean add_to_news: 1 — to add the story to friend's feed.
     *      - array user_ids: List of users IDs who can see the story.
     *      - string reply_to_story: ID of the story to reply with the current.
     *      - string link_text: Link text (for community's stories only).
     *      - string link_url: Link URL. Internal links on https://vk.com only.
     *      - integer group_id: ID of the community to upload the story (should be verified or with the "fire"
     *        icon).
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws VKApiBlockedException Content blocked
     * @throws VKApiMessagesUserBlockedException Can't send messages for users from blacklist
     * @throws VKApiIncorrectReplyPrivacyException Incorrect reply privacy
     *
     */
    public function getVideoUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('stories.getVideoUploadServer', $access_token, $params);
    }

    /**
     * Returns a list of story viewers.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: Story owner ID.
     *      - integer story_id: Story ID.
     *      - integer count: Maximum number of results.
     *      - integer offset: Offset needed to return a specific subset of results.
     *      - boolean extended: '1' — to return detailed information about photos
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws VKApiStoryExpiredException Story has already expired
     *
     */
    public function getViewers(string $access_token, array $params = array()) {
        return $this->request->post('stories.getViewers', $access_token, $params);
    }

    /**
     * Hides all replies in the last 24 hours from the user to current user's stories.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user whose replies should be hidden.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function hideAllReplies(string $access_token, array $params = array()) {
        return $this->request->post('stories.hideAllReplies', $access_token, $params);
    }

    /**
     * Hides the reply to the current user's story.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of the user whose replies should be hidden.
     *      - integer story_id: Story ID.
     *      - string access_key: Access key for the private object.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function hideReply(string $access_token, array $params = array()) {
        return $this->request->post('stories.hideReply', $access_token, $params);
    }

    /**
     * Allows to show stories from hidden sources in current user's feed.
     *
     * @param $access_token string
     * @param $params array
     *      - array owners_ids: List of hidden sources to show stories from.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function unbanOwner(string $access_token, array $params = array()) {
        return $this->request->post('stories.unbanOwner', $access_token, $params);
    }
}
