<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamDateFromException extends VKApiException {

	/**
	 * VKApiParamDateFromException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(154, 'Invalid date (from)', $error);
	}
}
