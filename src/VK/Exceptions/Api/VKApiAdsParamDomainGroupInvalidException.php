<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupInvalidException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupInvalidException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(615, 'Domain group is invalid', $error);
	}
}
