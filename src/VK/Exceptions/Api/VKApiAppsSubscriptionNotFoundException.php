<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsSubscriptionNotFoundException extends VKApiException {

	/**
	 * VKApiAppsSubscriptionNotFoundException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1256, 'Subscription not found', $error);
	}
}
