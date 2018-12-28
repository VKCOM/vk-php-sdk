<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsTooManyPointsException extends VKApiException {

	/**
	 * VKApiAppsTooManyPointsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1250, 'User has too many points', $error);
	}
}
