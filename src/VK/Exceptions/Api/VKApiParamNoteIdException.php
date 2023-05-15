<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamNoteIdException extends VKApiException
{
	/**
	 * VKApiParamNoteIdException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(180, 'Note not found', $error);
	}
}

