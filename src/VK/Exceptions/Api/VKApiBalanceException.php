<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiBalanceException extends VKApiException {

	/**
	 * VKApiBalanceException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(504, 'Not enough money on owner's balance', $error);
	}
}
