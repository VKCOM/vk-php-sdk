<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiSameCheckinException extends VKApiException {

	/**
	 * VKApiSameCheckinException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(190, 'You have sent same checkin in last 10 minutes', $error);
	}
}
