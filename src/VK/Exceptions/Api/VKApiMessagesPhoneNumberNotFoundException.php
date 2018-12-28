<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesPhoneNumberNotFoundException extends VKApiException {

	/**
	 * VKApiMessagesPhoneNumberNotFoundException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(903, 'User with the given phone number is not found', $error);
	}
}
