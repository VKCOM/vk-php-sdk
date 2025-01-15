<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesForbiddenReactionException extends VKApiException
{
	/**
	 * VKApiMessagesForbiddenReactionException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1010, 'This reaction has been disabled', $error);
	}
}

