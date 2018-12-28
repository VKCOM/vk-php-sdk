<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesCallPrivacyException extends VKApiException {

	/**
	 * VKApiMessagesCallPrivacyException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(928, 'Can't make a call due to user privacy settings', $error);
	}
}
