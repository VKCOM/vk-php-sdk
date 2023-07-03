<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiLimitsException extends VKApiException
{
	/**
	 * VKApiLimitsException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(103, 'Out of limits', $error);
	}
}

