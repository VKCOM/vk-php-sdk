<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Gifts implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Gifts constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Returns a list of user gifts.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: User ID.
	 * - @var integer count: Number of gifts to return.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('gifts.get', $access_token, $params);
	}
}

