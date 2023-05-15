<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\FaveItemType;
use VK\Enums\FavePosition;
use VK\Enums\FaveType;
use VK\Exceptions\Api\VKApiFaveAliexpressTagException;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Fave implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Fave constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string url
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function addArticle(string $access_token, array $params = [])
	{
		return $this->request->post('fave.addArticle', $access_token, $params);
	}


	/**
	 * Adds a link to user faves.
	 * @param string $access_token
	 * @param array $params
	 * - @var string link: Link URL.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function addLink(string $access_token, array $params = [])
	{
		return $this->request->post('fave.addLink', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function addPage(string $access_token, array $params = [])
	{
		return $this->request->post('fave.addPage', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer id
	 * - @var string access_key
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function addPost(string $access_token, array $params = [])
	{
		return $this->request->post('fave.addPost', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer id
	 * - @var string access_key
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function addProduct(string $access_token, array $params = [])
	{
		return $this->request->post('fave.addProduct', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string name
	 * - @var FavePosition position
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 */
	public function addTag(string $access_token, array $params = [])
	{
		return $this->request->post('fave.addTag', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer id
	 * - @var string access_key
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function addVideo(string $access_token, array $params = [])
	{
		return $this->request->post('fave.addVideo', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer id
	 * - @var string name
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function editTag(string $access_token, array $params = [])
	{
		return $this->request->post('fave.editTag', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var boolean extended: '1' - to return additional 'wall', 'profiles', and 'groups' fields. By default: '0'.
	 * - @var FaveItemType item_type
	 * - @var integer tag_id: Tag ID.
	 * - @var integer offset: Offset needed to return a specific subset of users.
	 * - @var integer count: Number of users to return.
	 * - @var string fields
	 * - @var boolean is_from_snackbar
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('fave.get', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer offset
	 * - @var integer count
	 * - @var FaveType type
	 * - @var array[FaveFields] fields
	 * - @var integer tag_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getPages(string $access_token, array $params = [])
	{
		return $this->request->post('fave.getPages', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getTags(string $access_token)
	{
		return $this->request->post('fave.getTags', $access_token);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function markSeen(string $access_token)
	{
		return $this->request->post('fave.markSeen', $access_token);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer article_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removeArticle(string $access_token, array $params = [])
	{
		return $this->request->post('fave.removeArticle', $access_token, $params);
	}


	/**
	 * Removes link from the user's faves.
	 * @param string $access_token
	 * @param array $params
	 * - @var string link_id: Link ID (can be obtained by [vk.com/dev/faves.getLinks|faves.getLinks] method).
	 * - @var string link: Link URL
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removeLink(string $access_token, array $params = [])
	{
		return $this->request->post('fave.removeLink', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removePage(string $access_token, array $params = [])
	{
		return $this->request->post('fave.removePage', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removePost(string $access_token, array $params = [])
	{
		return $this->request->post('fave.removePost', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removeProduct(string $access_token, array $params = [])
	{
		return $this->request->post('fave.removeProduct', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removeTag(string $access_token, array $params = [])
	{
		return $this->request->post('fave.removeTag', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removeVideo(string $access_token, array $params = [])
	{
		return $this->request->post('fave.removeVideo', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] ids
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function reorderTags(string $access_token, array $params = [])
	{
		return $this->request->post('fave.reorderTags', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer group_id
	 * - @var array[integer] tag_ids
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function setPageTags(string $access_token, array $params = [])
	{
		return $this->request->post('fave.setPageTags', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var FaveItemType item_type
	 * - @var integer item_owner_id
	 * - @var integer item_id
	 * - @var array[integer] tag_ids
	 * - @var string link_id
	 * - @var string link_url
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiFaveAliexpressTagException Can't set AliExpress tag to this type of object
	 */
	public function setTags(string $access_token, array $params = [])
	{
		return $this->request->post('fave.setTags', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function trackPageInteraction(string $access_token, array $params = [])
	{
		return $this->request->post('fave.trackPageInteraction', $access_token, $params);
	}
}

