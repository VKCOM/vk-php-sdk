<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesPhoneNumberNoAccessException extends VKApiException {

	/**
	 * VKApiMessagesPhoneNumberNoAccessException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(933, 'The user disallowed finding him by phone number', $error);
	}
}
