<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAppsNotFoundSnippetException extends VKApiException
{
	/**
	 * VKApiAppsNotFoundSnippetException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(11006, 'Not found snippet', $error);
	}
}

