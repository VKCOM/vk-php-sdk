<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesCantEditPinnedYetException extends VKApiException
{
	/**
	 * VKApiMessagesCantEditPinnedYetException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(949, 'Can\'t edit pinned message yet', $error);
	}
}

