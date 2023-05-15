<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\Stories\UploadLinkText;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\Api\VKApiMessagesUserBlockedException;
use VK\Exceptions\Api\VKApiStoryExpiredException;
use VK\Exceptions\Api\VKApiStoryIncorrectReplyPrivacyException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Stories implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Stories constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Allows to hide stories from chosen sources from current user's feed.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] owners_ids: List of sources IDs
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function banOwner(string $access_token, array $params = [])
	{
		return $this->request->post('stories.banOwner', $access_token, $params);
	}


	/**
	 * Allows to delete story.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: Story owner's ID. Current user id is used by default.
	 * - @var integer story_id: Story ID.
	 * - @var array[string] stories
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function delete(string $access_token, array $params = [])
	{
		return $this->request->post('stories.delete', $access_token, $params);
	}


	/**
	 * Returns stories available for current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: Owner ID.
	 * - @var boolean extended: '1' - to return additional fields for users and communities. Default value is 0.
	 * - @var array[StoriesFields] fields
	 * - @var array[string] feed_item_ids
	 * - @var boolean minimized
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('stories.get', $access_token, $params);
	}


	/**
	 * Returns list of sources hidden from current user's feed.
	 * @param string $access_token
	 * @param array $params
	 * - @var boolean extended: '1' - to return additional fields for users and communities. Default value is 0.
	 * - @var array[StoriesFields] fields: Additional fields to return
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getBanned(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getBanned', $access_token, $params);
	}


	/**
	 * Returns story by its ID.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[string] stories: Stories IDs separated by commas. Use format {owner_id}+'_'+{story_id}, for example, 12345_54331.
	 * - @var boolean extended: '1' - to return additional fields for users and communities. Default value is 0.
	 * - @var array[StoriesFields] fields: Additional fields to return
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiStoryExpiredException Story has already expired
	 */
	public function getById(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getById', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer story_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getDetailedStats(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getDetailedStats', $access_token, $params);
	}


	/**
	 * Returns URL for uploading a story with photo.
	 * @param string $access_token
	 * @param array $params
	 * - @var boolean add_to_news: 1 - to add the story to friend's feed.
	 * - @var array[integer] user_ids: List of users IDs who can see the story.
	 * - @var string reply_to_story: ID of the story to reply with the current.
	 * - @var UploadLinkText link_text: Link text (for community's stories only).
	 * - @var string link_url: Link URL. Internal links on https://vk.com only.
	 * - @var integer group_id: ID of the community to upload the story (should be verified or with the "fire" icon).
	 * - @var string clickable_stickers
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesUserBlockedException Can't send messages for users from blacklist
	 * @throws VKApiStoryIncorrectReplyPrivacyException Incorrect reply privacy
	 * @throws VKApiBlockedException Content blocked
	 */
	public function getPhotoUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getPhotoUploadServer', $access_token, $params);
	}


	/**
	 * Returns replies to the story.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: Story owner ID.
	 * - @var integer story_id: Story ID.
	 * - @var string access_key: Access key for the private object.
	 * - @var boolean extended: '1' - to return additional fields for users and communities. Default value is 0.
	 * - @var array[StoriesFields] fields: Additional fields to return
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getReplies(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getReplies', $access_token, $params);
	}


	/**
	 * Returns stories available for current user.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: Story owner ID.
	 * - @var integer story_id: Story ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getStats(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getStats', $access_token, $params);
	}


	/**
	 * Allows to receive URL for uploading story with video.
	 * @param string $access_token
	 * @param array $params
	 * - @var boolean add_to_news: 1 - to add the story to friend's feed.
	 * - @var array[integer] user_ids: List of users IDs who can see the story.
	 * - @var string reply_to_story: ID of the story to reply with the current.
	 * - @var UploadLinkText link_text: Link text (for community's stories only).
	 * - @var string link_url: Link URL. Internal links on https://vk.com only.
	 * - @var integer group_id: ID of the community to upload the story (should be verified or with the "fire" icon).
	 * - @var string clickable_stickers
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesUserBlockedException Can't send messages for users from blacklist
	 * @throws VKApiStoryIncorrectReplyPrivacyException Incorrect reply privacy
	 * @throws VKApiBlockedException Content blocked
	 */
	public function getVideoUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getVideoUploadServer', $access_token, $params);
	}


	/**
	 * Returns a list of story viewers.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: Story owner ID.
	 * - @var integer story_id: Story ID.
	 * - @var integer count: Maximum number of results.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * - @var boolean extended: '1' - to return detailed information about photos
	 * - @var array[StoriesFields] fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiStoryExpiredException Story has already expired
	 */
	public function getViewers(string $access_token, array $params = [])
	{
		return $this->request->post('stories.getViewers', $access_token, $params);
	}


	/**
	 * Hides all replies in the last 24 hours from the user to current user's stories.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: ID of the user whose replies should be hidden.
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function hideAllReplies(string $access_token, array $params = [])
	{
		return $this->request->post('stories.hideAllReplies', $access_token, $params);
	}


	/**
	 * Hides the reply to the current user's story.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id: ID of the user whose replies should be hidden.
	 * - @var integer story_id: Story ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function hideReply(string $access_token, array $params = [])
	{
		return $this->request->post('stories.hideReply', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var array[string] upload_results
	 * - @var string upload_results_json
	 * - @var boolean extended
	 * - @var array[StoriesFields] fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function save(string $access_token, array $params = [])
	{
		return $this->request->post('stories.save', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string q
	 * - @var integer place_id
	 * - @var number latitude
	 * - @var number longitude
	 * - @var integer radius
	 * - @var integer mentioned_id
	 * - @var integer count
	 * - @var boolean extended
	 * - @var array[StoriesFields] fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function search(string $access_token, array $params = [])
	{
		return $this->request->post('stories.search', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string access_key
	 * - @var string message
	 * - @var boolean is_broadcast
	 * - @var boolean is_anonymous
	 * - @var boolean unseen_marker
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function sendInteraction(string $access_token, array $params = [])
	{
		return $this->request->post('stories.sendInteraction', $access_token, $params);
	}


	/**
	 * Allows to show stories from hidden sources in current user's feed.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] owners_ids: List of hidden sources to show stories from.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function unbanOwner(string $access_token, array $params = [])
	{
		return $this->request->post('stories.unbanOwner', $access_token, $params);
	}
}

