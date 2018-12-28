<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupBlockedException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupBlockedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(620, 'Domain group is blocked', $error);
	}
}
