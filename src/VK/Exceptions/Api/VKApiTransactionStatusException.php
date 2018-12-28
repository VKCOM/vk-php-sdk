<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiTransactionStatusException extends VKApiException {

	/**
	 * VKApiTransactionStatusException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(507, 'Transaction in bad state', $error);
	}
}
