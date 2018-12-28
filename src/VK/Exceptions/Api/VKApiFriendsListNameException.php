<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiFriendsListNameException extends VKApiException {

	/**
	 * VKApiFriendsListNameException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(172, 'Invalid list name', $error);
	}
}
