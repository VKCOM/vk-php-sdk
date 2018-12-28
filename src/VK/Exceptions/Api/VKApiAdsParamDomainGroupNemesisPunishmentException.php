<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupNemesisPunishmentException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupNemesisPunishmentException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(637, 'Domain group has active nemesis punishment', $error);
	}
}
