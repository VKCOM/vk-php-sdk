<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesGroupForNotificationsOnlyException extends VKApiException
{
	/**
	 * VKApiMessagesGroupForNotificationsOnlyException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(985, 'Cannot write to notifications only groups', $error);
	}
}

