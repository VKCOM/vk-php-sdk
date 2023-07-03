<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessVideoException extends VKApiException
{
	/**
	 * VKApiAccessVideoException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(204, 'Access denied', $error);
	}
}

