<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiInvalidAddressException extends VKApiException {

	/**
	 * VKApiInvalidAddressException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1260, 'Invalid screen name', $error);
	}
}
