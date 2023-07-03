<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAsrFileIsTooBigException extends VKApiException
{
	/**
	 * VKApiAsrFileIsTooBigException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(7702, 'Audio file is too big', $error);
	}
}

