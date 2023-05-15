<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTimeoutException extends VKApiException
{
	/**
	 * VKApiTimeoutException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(36, 'Method execution was interrupted due to timeout', $error);
	}
}

