<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketNotEnabledException extends VKApiException
{
	/**
	 * VKApiMarketNotEnabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1438, 'Market not enabled', $error);
	}
}

