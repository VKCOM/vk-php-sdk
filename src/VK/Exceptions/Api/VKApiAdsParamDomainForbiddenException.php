<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainForbiddenException extends VKApiException {

	/**
	 * VKApiAdsParamDomainForbiddenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(605, 'Domain is forbidden', $error);
	}
}
