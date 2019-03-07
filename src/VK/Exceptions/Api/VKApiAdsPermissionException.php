<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsPermissionException extends VKApiException {

	/**
	 * VKApiAdsPermissionException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(600, 'Permission denied. You have no access to operations specified with given object(s)', $error);
	}
}
