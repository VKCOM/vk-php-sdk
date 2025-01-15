<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketVariantsNotEnabledException extends VKApiException
{
	/**
	 * VKApiMarketVariantsNotEnabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1410, 'Variants not enabled', $error);
	}
}

