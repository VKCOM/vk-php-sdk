<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiStreamQuizRefcodeNotExistsException extends VKApiException {

	/**
	 * VKApiStreamQuizRefcodeNotExistsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(2201, 'Refcode not exists', $error);
	}
}
