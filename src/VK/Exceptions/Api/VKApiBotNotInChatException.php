<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiBotNotInChatException extends VKApiException {

	/**
	 * VKApiBotNotInChatException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(3001, 'Bot is not in this chat', $error);
	}
}
