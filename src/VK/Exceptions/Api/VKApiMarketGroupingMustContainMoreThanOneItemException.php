<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketGroupingMustContainMoreThanOneItemException extends VKApiException {

	/**
	 * VKApiMarketGroupingMustContainMoreThanOneItemException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1425, 'Grouping must have two or more items', $error);
	}
}
