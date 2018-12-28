<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiDisabledException extends VKApiException {

	/**
	 * VKApiDisabledException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(2, 'Application is disabled. Enable your application or use test mode', $error);
	}
}
