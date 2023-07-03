<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAuthAnonymousTokenHasExpiredException extends VKApiException
{
	/**
	 * VKApiAuthAnonymousTokenHasExpiredException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1114, 'Anonymous token has expired', $error);
	}
}

