<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketGroupingHasOtherPropertiesException extends VKApiException
{
	/**
	 * VKApiMarketGroupingHasOtherPropertiesException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1414, 'Grouping has other properties', $error);
	}
}

