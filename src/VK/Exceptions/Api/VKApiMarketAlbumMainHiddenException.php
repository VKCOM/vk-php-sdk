<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMarketAlbumMainHiddenException extends VKApiException
{
	/**
	 * VKApiMarketAlbumMainHiddenException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1446, 'Main album can not be hidden', $error);
	}
}

