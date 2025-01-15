<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesReactionsLimitReachedException extends VKApiException
{
	/**
	 * VKApiMessagesReactionsLimitReachedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1011, 'Reactions limit for this message has been reached', $error);
	}
}

