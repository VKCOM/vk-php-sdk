<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupTooManyAddressesException extends VKApiException {

	/**
	 * VKApiGroupTooManyAddressesException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(706, 'Too many addresses in club', $error);
	}
}
