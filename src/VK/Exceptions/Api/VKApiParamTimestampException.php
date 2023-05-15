<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamTimestampException extends VKApiException
{
	/**
	 * VKApiParamTimestampException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(150, 'Invalid timestamp', $error);
	}
}

