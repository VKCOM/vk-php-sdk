<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUserDeactivatedException extends VKApiException
{
	/**
	 * VKApiUserDeactivatedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3610, 'User is deactivated', $error);
	}
}

