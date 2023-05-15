<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAssertVotesException extends VKApiException
{
	/**
	 * VKApiAssertVotesException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3305, 'Assert votes', $error);
	}
}

