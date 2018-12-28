<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupForbiddenLinksException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupForbiddenLinksException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(621, 'Domain group has restriction: links are forbidden', $error);
	}
}
