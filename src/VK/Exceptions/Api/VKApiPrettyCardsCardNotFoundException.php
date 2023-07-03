<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiPrettyCardsCardNotFoundException extends VKApiException
{
	/**
	 * VKApiPrettyCardsCardNotFoundException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1900, 'Card not found', $error);
	}
}

