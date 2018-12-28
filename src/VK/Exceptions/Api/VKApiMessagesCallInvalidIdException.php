<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesCallInvalidIdException extends VKApiException {

	/**
	 * VKApiMessagesCallInvalidIdException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(930, 'Invalid session guid', $error);
	}
}
