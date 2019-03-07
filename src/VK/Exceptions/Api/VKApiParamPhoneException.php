<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamPhoneException extends VKApiException {

	/**
	 * VKApiParamPhoneException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1000, 'Invalid phone number', $error);
	}
}
