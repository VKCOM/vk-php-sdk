<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiEmailConfirmationNeedException extends VKApiException
{
	/**
	 * VKApiEmailConfirmationNeedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3304, 'Email confirmation needed', $error);
	}
}

