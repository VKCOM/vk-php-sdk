<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesTooLongMessageException extends VKApiException {

	/**
	 * VKApiMessagesTooLongMessageException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(914, 'Message is too long', $error);
	}
}
