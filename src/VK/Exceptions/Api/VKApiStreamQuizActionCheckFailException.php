<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiStreamQuizActionCheckFailException extends VKApiException {

	/**
	 * VKApiStreamQuizActionCheckFailException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(2202, 'Action check is failed', $error);
	}
}
