<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesUserNotDonException extends VKApiException
{
	/**
	 * VKApiMessagesUserNotDonException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(962, 'You can\'t access donut chat without subscription', $error);
	}
}

