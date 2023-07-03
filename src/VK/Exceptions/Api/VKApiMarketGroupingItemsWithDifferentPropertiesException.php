<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketGroupingItemsWithDifferentPropertiesException extends VKApiException
{
	/**
	 * VKApiMarketGroupingItemsWithDifferentPropertiesException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1412, 'Grouping items with different properties', $error);
	}
}

