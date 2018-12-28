<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiNoUserByPhoneException extends VKApiException {

	/**
	 * VKApiNoUserByPhoneException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1001, 'No user with such phone number', $error);
	}
}
