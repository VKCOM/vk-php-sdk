<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupLowPostsReachException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupLowPostsReachException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(626, 'Domain group has low posts reach', $error);
	}
}
