<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsLookalikeRequestAlreadyInProgressException extends VKApiException
{
	/**
	 * VKApiAdsLookalikeRequestAlreadyInProgressException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(630, 'Lookalike request with same source already in progress', $error);
	}
}

