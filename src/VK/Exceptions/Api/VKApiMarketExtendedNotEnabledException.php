<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketExtendedNotEnabledException extends VKApiException
{
	/**
	 * VKApiMarketExtendedNotEnabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1409, 'Extended market not enabled', $error);
	}
}

