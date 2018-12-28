<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiLikesIsLikedException extends VKApiException {

	/**
	 * VKApiLikesIsLikedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(230, 'Object is already liked', $error);
	}
}
