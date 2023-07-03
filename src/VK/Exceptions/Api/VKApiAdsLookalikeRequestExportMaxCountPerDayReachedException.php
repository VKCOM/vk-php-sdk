<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsLookalikeRequestExportMaxCountPerDayReachedException extends VKApiException
{
	/**
	 * VKApiAdsLookalikeRequestExportMaxCountPerDayReachedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(635, 'Max count of lookalike request audience saves per day reached', $error);
	}
}

