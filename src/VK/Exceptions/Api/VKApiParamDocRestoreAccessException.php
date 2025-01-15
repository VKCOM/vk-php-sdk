<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamDocRestoreAccessException extends VKApiException
{
	/**
	 * VKApiParamDocRestoreAccessException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1154, 'Access to document restoring is denied', $error);
	}
}

