<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiIpIsNotAllowedException extends VKApiException
{
	/**
	 * VKApiIpIsNotAllowedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(42, 'IP is not allowed', $error);
	}
}

