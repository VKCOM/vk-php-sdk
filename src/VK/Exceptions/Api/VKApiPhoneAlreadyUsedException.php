<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiPhoneAlreadyUsedException extends VKApiException {

	/**
	 * VKApiPhoneAlreadyUsedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1004, 'This phone number is used by another user', $error);
	}
}
