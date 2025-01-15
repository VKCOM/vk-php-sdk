<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesPendingMessageRequestException extends VKApiException
{
	/**
	 * VKApiMessagesPendingMessageRequestException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(988, 'Pending message request', $error);
	}
}

