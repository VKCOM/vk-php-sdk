<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketMaxPropertiesLimitExceedException extends VKApiException
{
	/**
	 * VKApiMarketMaxPropertiesLimitExceedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1418, 'Max properties limit exceeded', $error);
	}
}

