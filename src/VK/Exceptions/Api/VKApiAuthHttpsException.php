<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthHttpsException extends VKApiException {

	/**
	 * VKApiAuthHttpsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(16, 'HTTP authorization failed', $error);
	}
}
