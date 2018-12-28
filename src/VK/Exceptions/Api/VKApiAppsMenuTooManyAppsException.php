<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsMenuTooManyAppsException extends VKApiException {

	/**
	 * VKApiAppsMenuTooManyAppsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1259, 'Too many apps in menu', $error);
	}
}
