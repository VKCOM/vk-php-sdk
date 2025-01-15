<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAppsTooManySnippetsException extends VKApiException
{
	/**
	 * VKApiAppsTooManySnippetsException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(11005, 'Too many snippets', $error);
	}
}

