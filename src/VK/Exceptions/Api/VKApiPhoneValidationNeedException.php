<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiPhoneValidationNeedException extends VKApiException
{
	/**
	 * VKApiPhoneValidationNeedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3301, 'Phone validation needed', $error);
	}
}

