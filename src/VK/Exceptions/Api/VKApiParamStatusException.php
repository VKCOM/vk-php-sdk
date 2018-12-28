<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamStatusException extends VKApiException {

	/**
	 * VKApiParamStatusException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(124, 'Invalid status', $error);
	}
}
