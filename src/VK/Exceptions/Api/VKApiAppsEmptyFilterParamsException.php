<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAppsEmptyFilterParamsException extends VKApiException
{
	/**
	 * VKApiAppsEmptyFilterParamsException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(11003, 'Empty filter params', $error);
	}
}

