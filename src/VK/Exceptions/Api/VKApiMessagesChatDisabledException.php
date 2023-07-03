<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesChatDisabledException extends VKApiException
{
	/**
	 * VKApiMessagesChatDisabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(945, 'Chat was disabled', $error);
	}
}

