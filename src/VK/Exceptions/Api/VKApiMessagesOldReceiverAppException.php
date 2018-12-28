<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesOldReceiverAppException extends VKApiException {

	/**
	 * VKApiMessagesOldReceiverAppException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(923, 'Receiver's app is too old', $error);
	}
}
