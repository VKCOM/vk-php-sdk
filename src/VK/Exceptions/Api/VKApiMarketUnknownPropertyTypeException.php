<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketUnknownPropertyTypeException extends VKApiException
{
	/**
	 * VKApiMarketUnknownPropertyTypeException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1424, 'Unknown property type', $error);
	}
}

