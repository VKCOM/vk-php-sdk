<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupForbiddenSearchException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupForbiddenSearchException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(622, 'Domain group has restriction: excluded from search', $error);
	}
}
