<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiClientUpdateNeededException extends VKApiException
{
	/**
	 * VKApiClientUpdateNeededException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(35, 'Client update needed', $error);
	}
}

