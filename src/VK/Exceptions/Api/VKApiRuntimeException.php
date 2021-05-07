<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiRuntimeException extends VKApiException {

	/**
	 * VKApiRuntimeException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(13, 'Runtime error occurred during code invocation', $error);
	}
}
