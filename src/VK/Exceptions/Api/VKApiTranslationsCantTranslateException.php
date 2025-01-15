<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTranslationsCantTranslateException extends VKApiException
{
	/**
	 * VKApiTranslationsCantTranslateException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(11101, 'Can\'t translate.', $error);
	}
}

