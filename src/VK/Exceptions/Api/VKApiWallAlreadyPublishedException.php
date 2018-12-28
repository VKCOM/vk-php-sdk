<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWallAlreadyPublishedException extends VKApiException {

	/**
	 * VKApiWallAlreadyPublishedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(217, 'Wall post is already published', $error);
	}
}
