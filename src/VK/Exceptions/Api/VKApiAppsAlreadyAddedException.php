<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsAlreadyAddedException extends VKApiException {

	/**
	 * VKApiAppsAlreadyAddedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1258, 'Application is already added', $error);
	}
}
