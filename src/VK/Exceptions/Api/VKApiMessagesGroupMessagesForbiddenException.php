<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesGroupMessagesForbiddenException extends VKApiException {

	/**
	 * VKApiMessagesGroupMessagesForbiddenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(916, 'Group messages were banned', $error);
	}
}
