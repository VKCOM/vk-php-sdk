<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiFaveAliexpressTagException extends VKApiException
{
	/**
	 * VKApiFaveAliexpressTagException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(3800, 'Can\'t set AliExpress tag to this type of object', $error);
	}
}

