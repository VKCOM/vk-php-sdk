<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesGroupPeerAccessException extends VKApiException {

	/**
	 * VKApiMessagesGroupPeerAccessException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(932, 'Your community can\'t interact with this peer', $error);
	}
}
