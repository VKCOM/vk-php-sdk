<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsPaymentsLimitException extends VKApiException {

	/**
	 * VKApiAppsPaymentsLimitException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1253, 'Votes transfer limit in this app', $error);
	}
}
