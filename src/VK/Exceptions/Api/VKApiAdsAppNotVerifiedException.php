<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsAppNotVerifiedException extends VKApiException {

	/**
	 * VKApiAdsAppNotVerifiedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(611, 'Application must be verified', $error);
	}
}
