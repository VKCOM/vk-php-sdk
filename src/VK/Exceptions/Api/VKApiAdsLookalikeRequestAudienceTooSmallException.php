<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsLookalikeRequestAudienceTooSmallException extends VKApiException
{
	/**
	 * VKApiAdsLookalikeRequestAudienceTooSmallException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(632, 'Given audience is too small', $error);
	}
}

