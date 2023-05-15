<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsLookalikeRequestExportRetargetingGroupLimitException extends VKApiException
{
	/**
	 * VKApiAdsLookalikeRequestExportRetargetingGroupLimitException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(636, 'Max count of retargeting groups reached', $error);
	}
}

