<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUnknownApplicationException extends VKApiException
{
	/**
	 * VKApiUnknownApplicationException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(38, 'Unknown application', $error);
	}
}

