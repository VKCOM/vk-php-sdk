<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiClientVersionDeprecatedException extends VKApiException
{
	/**
	 * VKApiClientVersionDeprecatedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(34, 'Client version deprecated', $error);
	}
}

