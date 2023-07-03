<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesMessageCannotBeForwardedException extends VKApiException
{
	/**
	 * VKApiMessagesMessageCannotBeForwardedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(969, 'Message cannot be forwarded', $error);
	}
}

