<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiStickersNotPurchasedException extends VKApiException
{
	/**
	 * VKApiStickersNotPurchasedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(2100, 'Stickers are not purchased', $error);
	}
}

