<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiNotSupportedHttpMethodException extends VKApiException
{
	/**
	 * VKApiNotSupportedHttpMethodException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(9999, 'Not supported http method', $error);
	}
}

