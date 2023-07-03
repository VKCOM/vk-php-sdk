<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsLookalikeRequestMaxCountPerDayReachedException extends VKApiException
{
	/**
	 * VKApiAdsLookalikeRequestMaxCountPerDayReachedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(631, 'Max count of lookalike requests per day reached', $error);
	}
}

