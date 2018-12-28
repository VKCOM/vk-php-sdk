<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupWrongClassException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupWrongClassException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(627, 'Domain group has wrong class', $error);
	}
}
