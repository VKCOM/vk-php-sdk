<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiNotImplementedYetException extends VKApiException
{
	/**
	 * VKApiNotImplementedYetException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(33, 'Not implemented yet', $error);
	}
}

