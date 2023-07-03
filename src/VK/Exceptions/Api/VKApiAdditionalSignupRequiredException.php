<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAdditionalSignupRequiredException extends VKApiException
{
	/**
	 * VKApiAdditionalSignupRequiredException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(41, 'Additional signup required', $error);
	}
}

