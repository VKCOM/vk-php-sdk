<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketPhotosCropSizeTooLowException extends VKApiException
{
	/**
	 * VKApiMarketPhotosCropSizeTooLowException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1435, 'Crop size is less than the minimum', $error);
	}
}

