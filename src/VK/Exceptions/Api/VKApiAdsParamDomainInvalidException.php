<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainInvalidException extends VKApiException {

	/**
	 * VKApiAdsParamDomainInvalidException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(604, 'Invalid domain', $error);
	}
}
