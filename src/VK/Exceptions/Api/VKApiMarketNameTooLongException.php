<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketNameTooLongException extends VKApiException
{
	/**
	 * VKApiMarketNameTooLongException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1421, 'Name too long', $error);
	}
}

