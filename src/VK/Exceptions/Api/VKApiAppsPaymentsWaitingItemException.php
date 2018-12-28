<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsPaymentsWaitingItemException extends VKApiException {

	/**
	 * VKApiAppsPaymentsWaitingItemException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1254, 'Apps item waiting', $error);
	}
}
