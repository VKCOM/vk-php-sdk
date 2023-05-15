<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketOrdersInvalidStatusException extends VKApiException
{
	/**
	 * VKApiMarketOrdersInvalidStatusException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1456, 'Order status is invalid', $error);
	}
}

