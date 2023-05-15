<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Storage implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Storage constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Returns a value of variable with the name set by key parameter.
	 * @param string $access_token
	 * @param array $params
	 * - @var string key
	 * - @var array[string] keys
	 * - @var integer user_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('storage.get', $access_token, $params);
	}


	/**
	 * Returns the names of all variables.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: user id, whose variables names are returned if they were requested with a server method.
	 * - @var integer offset
	 * - @var integer count: amount of variable names the info needs to be collected from.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getKeys(string $access_token, array $params = [])
	{
		return $this->request->post('storage.getKeys', $access_token, $params);
	}


	/**
	 * Saves a value of variable with the name set by 'key' parameter.
	 * @param string $access_token
	 * @param array $params
	 * - @var string key
	 * - @var string value
	 * - @var integer user_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 */
	public function set(string $access_token, array $params = [])
	{
		return $this->request->post('storage.set', $access_token, $params);
	}
}

