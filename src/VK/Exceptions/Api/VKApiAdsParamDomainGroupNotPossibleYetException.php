<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupNotPossibleYetException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupNotPossibleYetException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(619, 'Domain group is not possible to be joined to adsweb', $error);
	}
}
