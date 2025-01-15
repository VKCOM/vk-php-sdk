<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCuaConfirmationRequiredException extends VKApiException
{
	/**
	 * VKApiCuaConfirmationRequiredException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(11500, 'CheckUserAction confirmation required', $error);
	}
}

