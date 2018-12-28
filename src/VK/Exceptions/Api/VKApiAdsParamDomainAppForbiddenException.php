<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainAppForbiddenException extends VKApiException {

	/**
	 * VKApiAdsParamDomainAppForbiddenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(610, 'Domain app is forbidden', $error);
	}
}
