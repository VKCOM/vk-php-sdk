<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiPrefixOccupiedException extends VKApiException {

	/**
	 * VKApiPrefixOccupiedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(145, 'Sms prefix is occupied', $error);
	}
}
