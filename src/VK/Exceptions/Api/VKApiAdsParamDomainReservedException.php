<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainReservedException extends VKApiException {

	/**
	 * VKApiAdsParamDomainReservedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(606, 'Domain is reserved', $error);
	}
}
