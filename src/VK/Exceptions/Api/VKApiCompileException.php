<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCompileException extends VKApiException
{
	/**
	 * VKApiCompileException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(12, 'Unable to compile code', $error);
	}
}

