<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesWritingDisabledForChatException extends VKApiException
{
	/**
	 * VKApiMessagesWritingDisabledForChatException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(1012, 'Writing is disabled for this chat', $error);
	}
}

