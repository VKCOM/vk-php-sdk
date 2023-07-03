<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Calls implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Calls constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string call_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function forceFinish(string $access_token, array $params = [])
	{
		return $this->request->post('calls.forceFinish', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function start(string $access_token, array $params = [])
	{
		return $this->request->post('calls.start', $access_token, $params);
	}
}

