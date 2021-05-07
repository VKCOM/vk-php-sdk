<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketItemAlreadyAddedException extends VKApiException {

	/**
	 * VKApiMarketItemAlreadyAddedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1404, 'Item already added to album', $error);
	}
}
