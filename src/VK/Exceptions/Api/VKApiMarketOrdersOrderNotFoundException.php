<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketOrdersOrderNotFoundException extends VKApiException
{
	/**
	 * VKApiMarketOrdersOrderNotFoundException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1436, 'Order not found', $error);
	}
}

