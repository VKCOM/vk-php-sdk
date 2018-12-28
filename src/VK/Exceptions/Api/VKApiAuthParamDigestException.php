<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthParamDigestException extends VKApiException {

	/**
	 * VKApiAuthParamDigestException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1103, 'Invalid digest', $error);
	}
}
