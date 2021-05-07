<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMethodAdsException extends VKApiException {

	/**
	 * VKApiMethodAdsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(21, 'Permission to perform this action is allowed only for standalone and OpenAPI applications', $error);
	}
}
