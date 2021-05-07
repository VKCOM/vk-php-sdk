<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiVotesPermissionException extends VKApiException {

	/**
	 * VKApiVotesPermissionException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(500, 'Permission denied. You must enable votes processing in application settings', $error);
	}
}
