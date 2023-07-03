<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiStatusNoAudioException extends VKApiException
{
	/**
	 * VKApiStatusNoAudioException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(221, 'User disabled track name broadcast', $error);
	}
}

