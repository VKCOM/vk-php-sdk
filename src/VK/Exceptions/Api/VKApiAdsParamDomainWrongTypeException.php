<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainWrongTypeException extends VKApiException {

	/**
	 * VKApiAdsParamDomainWrongTypeException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(614, 'Domain of type specified is forbidden in current office type', $error);
	}
}
