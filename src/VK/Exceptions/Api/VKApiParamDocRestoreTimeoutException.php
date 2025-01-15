<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamDocRestoreTimeoutException extends VKApiException
{
	/**
	 * VKApiParamDocRestoreTimeoutException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1155, 'Document was deleted too long ago', $error);
	}
}

