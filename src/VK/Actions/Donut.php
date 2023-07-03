<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Donut implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Donut constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * - @var integer offset
	 * - @var integer count
	 * - @var array[string] fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getFriends(string $access_token, array $params = [])
	{
		return $this->request->post('donut.getFriends', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function getSubscription(string $access_token, array $params = [])
	{
		return $this->request->post('donut.getSubscription', $access_token, $params);
	}


	/**
	 * Returns a list of user's VK Donut subscriptions.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[DonutFields] fields
	 * - @var integer offset
	 * - @var integer count
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSubscriptions(string $access_token, array $params = [])
	{
		return $this->request->post('donut.getSubscriptions', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer owner_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function isDon(string $access_token, array $params = [])
	{
		return $this->request->post('donut.isDon', $access_token, $params);
	}
}

