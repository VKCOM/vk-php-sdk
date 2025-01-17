<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketServicesDisabledException extends VKApiException
{
	/**
	 * VKApiMarketServicesDisabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1526, 'Market services are disabled', $error);
	}
}

