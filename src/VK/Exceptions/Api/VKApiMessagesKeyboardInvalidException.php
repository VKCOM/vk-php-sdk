<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesKeyboardInvalidException extends VKApiException {

	/**
	 * VKApiMessagesKeyboardInvalidException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(911, 'Keyboard format is invalid', $error);
	}
}
