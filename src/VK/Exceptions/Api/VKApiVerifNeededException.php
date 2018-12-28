<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiVerifNeededException extends VKApiException {

	/**
	 * VKApiVerifNeededException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(102, 'To perform this action you must be an administrator of this application or your application should be verified by site administration', $error);
	}
}
