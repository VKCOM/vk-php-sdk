<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiVkpayMaxCashbackCountException extends VKApiException {

	/**
	 * VKApiVkpayMaxCashbackCountException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(550, 'Max count of cashback for user by this offer', $error);
	}
}
