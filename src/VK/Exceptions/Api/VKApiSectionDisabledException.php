<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiSectionDisabledException extends VKApiException
{
	/**
	 * VKApiSectionDisabledException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(43, 'This section is temporary unavailable', $error);
	}
}

