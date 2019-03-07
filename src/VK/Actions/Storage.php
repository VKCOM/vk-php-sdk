<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Storage {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Storage constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Returns a value of variable with the name set by key parameter.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string key
	 * - @var array[string] keys
	 * - @var integer user_id
	 * - @var boolean global
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('storage.get', $access_token, $params);
	}

	/**
	 * Returns the names of all variables.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: user id, whose variables names are returned if they were requested with a server method.
	 * - @var boolean global
	 * - @var integer offset
	 * - @var integer count: amount of variable names the info needs to be collected from.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getKeys($access_token, array $params = []) {
		return $this->request->post('storage.getKeys', $access_token, $params);
	}

	/**
	 * Saves a value of variable with the name set by 'key' parameter.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string key
	 * - @var string value
	 * - @var integer user_id
	 * - @var boolean global
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 * @return mixed
	 */
	public function set($access_token, array $params = []) {
		return $this->request->post('storage.set', $access_token, $params);
	}
}
