<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAlbumsLimitException extends VKApiException {

	/**
	 * VKApiAlbumsLimitException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(302, 'Albums number limit is reached', $error);
	}
}
