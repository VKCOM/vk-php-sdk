<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketGroupingItemsMustHaveDistinctPropertiesException extends VKApiException {

	/**
	 * VKApiMarketGroupingItemsMustHaveDistinctPropertiesException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1426, 'Item must have distinct properties', $error);
	}
}
