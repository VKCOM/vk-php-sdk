<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainActiveException extends VKApiException {

	/**
	 * VKApiAdsParamDomainActiveException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(608, 'Domain is active', $error);
	}
}
