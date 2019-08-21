<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesCantPinOneTimeStoryException extends VKApiException {

	/**
	 * VKApiMessagesCantPinOneTimeStoryException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(942, 'Cannot pin one-time story', $error);
	}
}
