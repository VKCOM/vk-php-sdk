<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiWallCheckLinkCantDetermineSourceException extends VKApiException
{
	/**
	 * VKApiWallCheckLinkCantDetermineSourceException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3102, 'Specified link is incorrect (can\'t find source)', $error);
	}
}

