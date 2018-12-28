<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupRecentlyCreatedException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupRecentlyCreatedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(628, 'Domain group is created recently', $error);
	}
}
