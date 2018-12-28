<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupNotOpenException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupNotOpenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(618, 'Domain group is not open', $error);
	}
}
