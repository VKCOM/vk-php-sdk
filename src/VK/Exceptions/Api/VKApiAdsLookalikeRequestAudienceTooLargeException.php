<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsLookalikeRequestAudienceTooLargeException extends VKApiException
{
	/**
	 * VKApiAdsLookalikeRequestAudienceTooLargeException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(633, 'Given audience is too large', $error);
	}
}

