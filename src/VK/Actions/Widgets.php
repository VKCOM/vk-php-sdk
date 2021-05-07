<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Widgets {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Widgets constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Gets a list of comments for the page added through the [vk.com/dev/Comments|Comments widget].
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer widget_api_id
	 * - @var string url
	 * - @var string page_id
	 * - @var string order
	 * - @var array[WidgetsFields] fields
	 * - @var integer offset
	 * - @var integer count
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getComments($access_token, array $params = []) {
		return $this->request->post('widgets.getComments', $access_token, $params);
	}

	/**
	 * Gets a list of application/site pages where the [vk.com/dev/Comments|Comments widget] or [vk.com/dev/Like|Like widget] is installed.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer widget_api_id
	 * - @var string order
	 * - @var string period
	 * - @var integer offset
	 * - @var integer count
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getPages($access_token, array $params = []) {
		return $this->request->post('widgets.getPages', $access_token, $params);
	}
}
