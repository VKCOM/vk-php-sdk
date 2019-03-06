<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupNotInClubException extends VKApiException {

	/**
	 * VKApiGroupNotInClubException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(701, 'User should be in club', $error);
	}
}
