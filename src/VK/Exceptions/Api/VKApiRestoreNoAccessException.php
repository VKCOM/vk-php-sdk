<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiRestoreNoAccessException extends VKApiException {

	/**
	 * VKApiRestoreNoAccessException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1800, 'You have no access to this method', $error);
	}
}
