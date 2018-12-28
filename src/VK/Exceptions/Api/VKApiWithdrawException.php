<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWithdrawException extends VKApiException {

	/**
	 * VKApiWithdrawException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(505, 'Cannot withdraw votes', $error);
	}
}
