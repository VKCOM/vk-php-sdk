<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiProductNotFoundException extends VKApiException {

	/**
	 * VKApiProductNotFoundException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1211, 'Product not found', $error);
	}
}
