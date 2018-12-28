<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamUserFromException extends VKApiException {

	/**
	 * VKApiParamUserFromException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(152, 'Invalid user id (from)', $error);
	}
}
