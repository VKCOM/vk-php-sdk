<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesUserBlockedException extends VKApiException {

	/**
	 * VKApiMessagesUserBlockedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(900, 'Can\'t send messages for users from blacklist', $error);
	}
}
