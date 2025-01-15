<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketItemIsNotDeletedException extends VKApiException
{
	/**
	 * VKApiMarketItemIsNotDeletedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1518, 'Item is not deleted', $error);
	}
}

