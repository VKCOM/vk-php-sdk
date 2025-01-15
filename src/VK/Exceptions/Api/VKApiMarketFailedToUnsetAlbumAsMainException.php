<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketFailedToUnsetAlbumAsMainException extends VKApiException
{
	/**
	 * VKApiMarketFailedToUnsetAlbumAsMainException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1458, 'Failed to unset album as main', $error);
	}
}

