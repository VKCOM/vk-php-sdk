<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiEnabledInTestException extends VKApiException {

	/**
	 * VKApiEnabledInTestException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(11, 'In test mode application should be disabled or user should be authorized', $error);
	}
}
