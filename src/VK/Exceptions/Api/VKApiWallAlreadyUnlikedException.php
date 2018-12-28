<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWallAlreadyUnlikedException extends VKApiException {

	/**
	 * VKApiWallAlreadyUnlikedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(216, 'Wall post is already unliked', $error);
	}
}
