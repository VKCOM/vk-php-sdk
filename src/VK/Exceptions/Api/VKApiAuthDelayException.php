<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthDelayException extends VKApiException {

	/**
	 * VKApiAuthDelayException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1112, 'Processing.. Try later', $error);
	}
}
