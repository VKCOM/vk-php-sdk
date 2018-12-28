<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiGiftNotAvailableException extends VKApiException {

	/**
	 * VKApiGiftNotAvailableException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1190, 'Cannot send this gift', $error);
	}
}
