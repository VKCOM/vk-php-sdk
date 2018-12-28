<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamAmountException extends VKApiException {

	/**
	 * VKApiParamAmountException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(506, 'Invalid amount', $error);
	}
}
