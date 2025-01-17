<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketDisabledException extends VKApiException
{
	/**
	 * VKApiMarketDisabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1525, 'Market is disabled', $error);
	}
}

