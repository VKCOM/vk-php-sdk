<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketRestoreTooLateException extends VKApiException {

	/**
	 * VKApiMarketRestoreTooLateException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1400, 'Too late for restore', $error);
	}
}
