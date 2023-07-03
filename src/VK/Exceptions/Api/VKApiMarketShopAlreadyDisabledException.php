<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketShopAlreadyDisabledException extends VKApiException
{
	/**
	 * VKApiMarketShopAlreadyDisabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1432, 'Market was already disabled in this group', $error);
	}
}

