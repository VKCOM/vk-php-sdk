<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiStatusNoAudioException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Status {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Status constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Returns data required to show the status of a user or community.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID or community ID. Use a negative value to designate a community ID.
	 * - @var integer group_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('status.get', $access_token, $params);
	}

	/**
	 * Sets a new status for the current user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string text: Text of the new status.
	 * - @var integer group_id: Identifier of a community to set a status in. If left blank the status is set to current user.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiStatusNoAudioException User disabled track name broadcast
	 * @return mixed
	 */
	public function set($access_token, array $params = []) {
		return $this->request->post('status.set', $access_token, $params);
	}
}
