<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiProductNotAvailableException extends VKApiException {

	/**
	 * VKApiProductNotAvailableException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1210, 'Product is not available', $error);
	}
}
