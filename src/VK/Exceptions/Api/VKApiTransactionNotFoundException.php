<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTransactionNotFoundException extends VKApiException {

	/**
	 * VKApiTransactionNotFoundException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(508, 'Transaction not found', $error);
	}
}
