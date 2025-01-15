<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketGroupingMustHaveVariantsException extends VKApiException
{
	/**
	 * VKApiMarketGroupingMustHaveVariantsException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1415, 'Grouping must have variants', $error);
	}
}

