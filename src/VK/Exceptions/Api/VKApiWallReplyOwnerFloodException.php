<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWallReplyOwnerFloodException extends VKApiException {

	/**
	 * VKApiWallReplyOwnerFloodException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(223, 'Too many replies', $error);
	}
}
