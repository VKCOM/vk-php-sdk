<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiUserDeletedException extends VKApiException {

	/**
	 * VKApiUserDeletedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(18, 'User was deleted or banned', $error);
	}
}
