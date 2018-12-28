<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesEmailNoAccessException extends VKApiException {

	/**
	 * VKApiMessagesEmailNoAccessException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(918, 'You can't send messages to this email', $error);
	}
}
