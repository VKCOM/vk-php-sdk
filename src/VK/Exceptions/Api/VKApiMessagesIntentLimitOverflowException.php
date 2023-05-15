<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesIntentLimitOverflowException extends VKApiException
{
	/**
	 * VKApiMessagesIntentLimitOverflowException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(944, 'Limits overflow for this intent', $error);
	}
}

