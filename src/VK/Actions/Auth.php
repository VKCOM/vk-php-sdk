<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiAuthFloodException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Auth implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Auth constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Allows to restore account access using a code received via SMS. " This method is only available for apps with [vk.com/dev/auth_direct|Direct authorization] access. "
	 * @param string $access_token
	 * @param array $params
	 * - @var string phone: User phone number.
	 * - @var string last_name: User last name.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAuthFloodException Too many auth attempts, try again later
	 */
	public function restore(string $access_token, array $params = [])
	{
		return $this->request->post('auth.restore', $access_token, $params);
	}
}

