<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUserServiceDeactivatedException extends VKApiException
{
	/**
	 * VKApiUserServiceDeactivatedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3611, 'Service is deactivated for user', $error);
	}
}

