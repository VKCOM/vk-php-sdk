<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUnknownGroupException extends VKApiException
{
	/**
	 * VKApiUnknownGroupException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(40, 'Unknown group', $error);
	}
}

