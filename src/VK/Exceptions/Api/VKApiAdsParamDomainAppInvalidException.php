<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainAppInvalidException extends VKApiException {

	/**
	 * VKApiAdsParamDomainAppInvalidException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(609, 'Domain app is invalid', $error);
	}
}
