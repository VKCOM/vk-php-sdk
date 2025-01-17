<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesDropDeviceCacheException extends VKApiException
{
	/**
	 * VKApiMessagesDropDeviceCacheException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(990, 'Drop device cache', $error);
	}
}

