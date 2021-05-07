<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiFriendsListLimitException extends VKApiException {

	/**
	 * VKApiFriendsListLimitException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(173, 'Reached the maximum number of lists', $error);
	}
}
