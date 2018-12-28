<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAuthNoTokenException extends VKApiException {

	/**
	 * VKApiAuthNoTokenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1109, 'Token may be expired', $error);
	}
}
