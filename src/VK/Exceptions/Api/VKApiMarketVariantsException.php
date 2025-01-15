<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketVariantsException extends VKApiException
{
	/**
	 * VKApiMarketVariantsException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1411, 'Variants error', $error);
	}
}

