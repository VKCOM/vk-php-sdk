<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsSpecificException extends VKApiException
{
	/**
	 * VKApiAdsSpecificException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(603, 'Some ads error occurs', $error);
	}
}

