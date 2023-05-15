<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesPeerBlockedReasonByTimeException extends VKApiException
{
	/**
	 * VKApiMessagesPeerBlockedReasonByTimeException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(950, 'Can\'t send message, reply timed out', $error);
	}
}

