<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthFloodException extends VKApiException {

	/**
	 * VKApiAuthFloodException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1105, 'Too many auth attempts, try again later', $error);
	}
}
