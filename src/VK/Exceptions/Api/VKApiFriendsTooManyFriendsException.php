<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiFriendsTooManyFriendsException extends VKApiException
{
	/**
	 * VKApiFriendsTooManyFriendsException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(242, 'Too many friends', $error);
	}
}

