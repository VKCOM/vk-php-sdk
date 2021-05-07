<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamDocDeleteAccessException extends VKApiException {

	/**
	 * VKApiParamDocDeleteAccessException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1151, 'Access to document deleting is denied', $error);
	}
}
