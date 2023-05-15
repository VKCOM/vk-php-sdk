<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiFriendsListIdException extends VKApiException
{
	/**
	 * VKApiFriendsListIdException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(171, 'Invalid list id', $error);
	}
}

