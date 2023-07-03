<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTokenExtensionRequiredException extends VKApiException
{
	/**
	 * VKApiTokenExtensionRequiredException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3609, 'Token extension required', $error);
	}
}

