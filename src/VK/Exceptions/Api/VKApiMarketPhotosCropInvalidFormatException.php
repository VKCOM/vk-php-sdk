<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketPhotosCropInvalidFormatException extends VKApiException
{
	/**
	 * VKApiMarketPhotosCropInvalidFormatException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1433, 'Invalid image crop format', $error);
	}
}

