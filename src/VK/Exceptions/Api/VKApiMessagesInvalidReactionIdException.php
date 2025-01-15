<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesInvalidReactionIdException extends VKApiException
{
	/**
	 * VKApiMessagesInvalidReactionIdException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1009, 'Unknown reaction passed', $error);
	}
}

