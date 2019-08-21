<?php
namespace VK\Actions;

use VK\Actions\Enums\FaveItemType;
use VK\Actions\Enums\FaveType;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Fave {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Fave constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var string url
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @return mixed
	 */
	public function addArticle($access_token, array $params = []) {
		return $this->request->post('fave.addArticle', $access_token, $params);
	}

	/**
	 * Adds a link to user faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string link: Link URL.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addLink($access_token, array $params = []) {
		return $this->request->post('fave.addLink', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * - @var integer group_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addPage($access_token, array $params = []) {
		return $this->request->post('fave.addPage', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer id
	 * - @var string access_key
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addPost($access_token, array $params = []) {
		return $this->request->post('fave.addPost', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer id
	 * - @var string access_key
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addProduct($access_token, array $params = []) {
		return $this->request->post('fave.addProduct', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var string name
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 * @return mixed
	 */
	public function addTag($access_token, array $params = []) {
		return $this->request->post('fave.addTag', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer id
	 * - @var string access_key
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function addVideo($access_token, array $params = []) {
		return $this->request->post('fave.addVideo', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer id
	 * - @var string name
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function editTag($access_token, array $params = []) {
		return $this->request->post('fave.editTag', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var boolean extended: '1' — to return additional 'wall', 'profiles', and 'groups' fields. By default: '0'.
	 * - @var FaveItemType item_type
	 * - @var integer tag_id: Tag ID.
	 * - @var integer offset: Offset needed to return a specific subset of users.
	 * - @var integer count: Number of users to return.
	 * - @var string fields
	 * - @var boolean is_from_snackbar
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
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
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getPages($access_token, array $params = []) {
		return $this->request->post('fave.getPages', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getTags($access_token) {
		return $this->request->post('fave.getTags', $access_token);
	}

	/**
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function markSeen($access_token) {
		return $this->request->post('fave.markSeen', $access_token);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer article_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeArticle($access_token, array $params = []) {
		return $this->request->post('fave.removeArticle', $access_token, $params);
	}

	/**
	 * Removes link from the user's faves.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string link_id: Link ID (can be obtained by [vk.com/dev/faves.getLinks|faves.getLinks] method).
	 * - @var string link: Link URL
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeLink($access_token, array $params = []) {
		return $this->request->post('fave.removeLink', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * - @var integer group_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removePage($access_token, array $params = []) {
		return $this->request->post('fave.removePage', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removePost($access_token, array $params = []) {
		return $this->request->post('fave.removePost', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id
	 * - @var integer id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeProduct($access_token, array $params = []) {
		return $this->request->post('fave.removeProduct', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function removeTag($access_token, array $params = []) {
		return $this->request->post('fave.removeTag', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] ids
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function reorderTags($access_token, array $params = []) {
		return $this->request->post('fave.reorderTags', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * - @var integer group_id
	 * - @var array[integer] tag_ids
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @return mixed
	 */
	public function setPageTags($access_token, array $params = []) {
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
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @return mixed
	 */
	public function setTags($access_token, array $params = []) {
		return $this->request->post('fave.setTags', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id
	 * - @var integer group_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function trackPageInteraction($access_token, array $params = []) {
		return $this->request->post('fave.trackPageInteraction', $access_token, $params);
	}
}
