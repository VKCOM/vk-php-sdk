<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiGoogleTokenException extends VKApiException {

	/**
	 * VKApiGoogleTokenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1300, 'Invalid token', $error);
	}
}
