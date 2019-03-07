<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketItemHasBadLinksException extends VKApiException {

	/**
	 * VKApiMarketItemHasBadLinksException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1408, 'Item has bad links in description', $error);
	}
}
