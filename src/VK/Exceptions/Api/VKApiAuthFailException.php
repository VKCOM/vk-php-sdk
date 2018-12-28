<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthFailException extends VKApiException {

	/**
	 * VKApiAuthFailException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1107, 'Wrong login or digest', $error);
	}
}
