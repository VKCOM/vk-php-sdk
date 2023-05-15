<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiPrivateProfileException extends VKApiException
{
	/**
	 * VKApiPrivateProfileException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(30, 'This profile is private', $error);
	}
}

