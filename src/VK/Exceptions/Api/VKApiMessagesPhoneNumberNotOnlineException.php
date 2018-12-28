<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesPhoneNumberNotOnlineException extends VKApiException {

	/**
	 * VKApiMessagesPhoneNumberNotOnlineException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(904, 'The user was not online within the given timeframe', $error);
	}
}
