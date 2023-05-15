<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAsrAudioDurationFloodedException extends VKApiException
{
	/**
	 * VKApiAsrAudioDurationFloodedException constructor.
	 * @param VkApiError $error
	 */
	public function __construct(VKApiError $error)
	{
		parent::__construct(7701, 'Total audio duration limit reached', $error);
	}
}

