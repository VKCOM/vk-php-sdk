<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsOrderException extends VKApiException {

	/**
	 * VKApiAppsOrderException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1255, 'Error while purchasing order', $error);
	}
}
