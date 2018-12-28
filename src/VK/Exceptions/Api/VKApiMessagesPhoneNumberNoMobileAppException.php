<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesPhoneNumberNoMobileAppException extends VKApiException {

	/**
	 * VKApiMessagesPhoneNumberNoMobileAppException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(905, 'The user does not use an official app', $error);
	}
}
