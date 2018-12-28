<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupForbiddenCoverException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupForbiddenCoverException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(623, 'Domain group has restriction: cover is forbidden', $error);
	}
}
