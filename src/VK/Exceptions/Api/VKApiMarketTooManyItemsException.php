<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketTooManyItemsException extends VKApiException {

	/**
	 * VKApiMarketTooManyItemsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1405, 'Too many items', $error);
	}
}
