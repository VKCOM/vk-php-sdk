<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamDateToException extends VKApiException {

	/**
	 * VKApiParamDateToException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(155, 'Invalid date (to)', $error);
	}
}
