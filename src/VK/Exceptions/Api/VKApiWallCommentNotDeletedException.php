<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiWallCommentNotDeletedException extends VKApiException
{
	/**
	 * VKApiWallCommentNotDeletedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(243, 'Comment has not been deleted', $error);
	}
}

