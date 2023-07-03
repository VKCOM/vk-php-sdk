<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdsLookalikeRequestExportAlreadyInProgressException extends VKApiException
{
	/**
	 * VKApiAdsLookalikeRequestExportAlreadyInProgressException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(634, 'Lookalike request audience save already in progress', $error);
	}
}

