<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsParamDomainGroupWrongCategoryException extends VKApiException {

	/**
	 * VKApiAdsParamDomainGroupWrongCategoryException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(624, 'Domain group has wrong category', $error);
	}
}
