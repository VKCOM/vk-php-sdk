<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiRecaptchaException extends VKApiException
{
	/**
	 * VKApiRecaptchaException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3300, 'Recaptcha needed', $error);
	}
}

