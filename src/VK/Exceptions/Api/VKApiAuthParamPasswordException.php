<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthParamPasswordException extends VKApiException {

	/**
	 * VKApiAuthParamPasswordException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1111, 'Invalid password', $error);
	}
}
