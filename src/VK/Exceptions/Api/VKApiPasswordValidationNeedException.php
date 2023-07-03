<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiPasswordValidationNeedException extends VKApiException
{
	/**
	 * VKApiPasswordValidationNeedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3302, 'Password validation needed', $error);
	}
}

