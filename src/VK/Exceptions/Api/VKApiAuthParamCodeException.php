<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthParamCodeException extends VKApiException {

	/**
	 * VKApiAuthParamCodeException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1110, 'Incorrect code', $error);
	}
}
