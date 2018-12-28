<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiStoryDoesntExistException extends VKApiException {

	/**
	 * VKApiStoryDoesntExistException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(1601, 'Can't reply to this story', $error);
	}
}
