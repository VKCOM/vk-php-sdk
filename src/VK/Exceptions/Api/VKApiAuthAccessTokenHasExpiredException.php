<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAuthAccessTokenHasExpiredException extends VKApiException
{
	/**
	 * VKApiAuthAccessTokenHasExpiredException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1117, 'Access token has expired', $error);
	}
}

