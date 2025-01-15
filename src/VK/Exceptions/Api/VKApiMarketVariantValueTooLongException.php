<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketVariantValueTooLongException extends VKApiException
{
	/**
	 * VKApiMarketVariantValueTooLongException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1423, 'Variant value is too long', $error);
	}
}

