<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamHashException extends VKApiException
{
	/**
	 * VKApiParamHashException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(121, 'Invalid hash', $error);
	}
}

