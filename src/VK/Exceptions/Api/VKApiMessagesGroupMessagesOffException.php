<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesGroupMessagesOffException extends VKApiException {

	/**
	 * VKApiMessagesGroupMessagesOffException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(915, 'Group turned off messages', $error);
	}
}
