<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamPhotosException extends VKApiException {

	/**
	 * VKApiParamPhotosException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(122, 'Invalid photos', $error);
	}
}
