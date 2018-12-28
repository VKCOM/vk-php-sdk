<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiLikesIsUnlikedException extends VKApiException {

	/**
	 * VKApiLikesIsUnlikedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(231, 'Object is already unliked', $error);
	}
}
