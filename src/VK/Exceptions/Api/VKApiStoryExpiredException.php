<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiStoryExpiredException extends VKApiException {

	/**
	 * VKApiStoryExpiredException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1600, 'Story has already expired', $error);
	}
}
