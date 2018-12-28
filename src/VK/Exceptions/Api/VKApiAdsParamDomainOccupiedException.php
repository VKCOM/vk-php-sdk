<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainOccupiedException extends VKApiException {

	/**
	 * VKApiAdsParamDomainOccupiedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(607, 'Domain is occupied', $error);
	}
}
