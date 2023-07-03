<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesChatUserLeftException extends VKApiException
{
	/**
	 * VKApiMessagesChatUserLeftException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(922, 'You left this chat', $error);
	}
}

