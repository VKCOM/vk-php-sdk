<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUnknownUserException extends VKApiException
{
	/**
	 * VKApiUnknownUserException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(39, 'Unknown user', $error);
	}
}

