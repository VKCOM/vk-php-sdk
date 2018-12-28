<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAccessCheckinException extends VKApiException {

	/**
	 * VKApiAccessCheckinException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(191, 'Access to checkins denied', $error);
	}
}
