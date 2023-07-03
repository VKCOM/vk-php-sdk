<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiLikesReactionCanNotBeAppliedException extends VKApiException
{
	/**
	 * VKApiLikesReactionCanNotBeAppliedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(232, 'Reaction can not be applied to the object', $error);
	}
}

