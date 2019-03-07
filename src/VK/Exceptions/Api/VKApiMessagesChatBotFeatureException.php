<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesChatBotFeatureException extends VKApiException {

	/**
	 * VKApiMessagesChatBotFeatureException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(912, 'This is a chat bot feature, change this status in settings', $error);
	}
}
