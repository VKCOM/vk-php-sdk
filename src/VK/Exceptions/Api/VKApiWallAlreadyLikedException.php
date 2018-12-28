<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWallAlreadyLikedException extends VKApiException {

	/**
	 * VKApiWallAlreadyLikedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(215, 'Wall post is already liked', $error);
	}
}
