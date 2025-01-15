<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketMaxVariantsLimitExceedException extends VKApiException
{
	/**
	 * VKApiMarketMaxVariantsLimitExceedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1419, 'Max variant limit exceeded', $error);
	}
}

