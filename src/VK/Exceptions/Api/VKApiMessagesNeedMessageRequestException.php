<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesNeedMessageRequestException extends VKApiException
{
	/**
	 * VKApiMessagesNeedMessageRequestException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(987, 'Need message request', $error);
	}
}

