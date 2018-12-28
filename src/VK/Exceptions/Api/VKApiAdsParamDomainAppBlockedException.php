<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainAppBlockedException extends VKApiException {

	/**
	 * VKApiAdsParamDomainAppBlockedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(617, 'Domain app is blocked', $error);
	}
}
