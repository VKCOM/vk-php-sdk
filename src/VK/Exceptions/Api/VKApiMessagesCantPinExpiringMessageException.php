<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesCantPinExpiringMessageException extends VKApiException
{
	/**
	 * VKApiMessagesCantPinExpiringMessageException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(970, 'Cannot pin an expiring message', $error);
	}
}

