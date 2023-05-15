<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAsrInvalidHashException extends VKApiException
{
	/**
	 * VKApiAsrInvalidHashException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(7703, 'Invalid hash', $error);
	}
}

