<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAppsEmptySnippetDataException extends VKApiException
{
	/**
	 * VKApiAppsEmptySnippetDataException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(11004, 'Empty snippet data', $error);
	}
}

