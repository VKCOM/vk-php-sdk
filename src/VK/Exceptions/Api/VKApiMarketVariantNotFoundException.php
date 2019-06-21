<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketVariantNotFoundException extends VKApiException {

	/**
	 * VKApiMarketVariantNotFoundException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1416, 'Variant not found', $error);
	}
}
