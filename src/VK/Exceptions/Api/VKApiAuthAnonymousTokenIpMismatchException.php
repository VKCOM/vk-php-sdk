<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAuthAnonymousTokenIpMismatchException extends VKApiException
{
	/**
	 * VKApiAuthAnonymousTokenIpMismatchException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1118, 'Anonymous token ip mismatch', $error);
	}
}

