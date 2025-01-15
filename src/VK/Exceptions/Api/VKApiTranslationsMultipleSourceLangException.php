<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTranslationsMultipleSourceLangException extends VKApiException
{
	/**
	 * VKApiTranslationsMultipleSourceLangException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(11102, 'Multiple source languages. Only one allowed.', $error);
	}
}

