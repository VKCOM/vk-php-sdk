<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAsrNotFoundException extends VKApiException
{
	/**
	 * VKApiAsrNotFoundException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(7704, 'Task not found', $error);
	}
}

