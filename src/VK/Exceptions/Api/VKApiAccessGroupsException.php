<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAccessGroupsException extends VKApiException {

	/**
	 * VKApiAccessGroupsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(260, 'Access to the groups list is denied due to the user\'s privacy settings', $error);
	}
}
