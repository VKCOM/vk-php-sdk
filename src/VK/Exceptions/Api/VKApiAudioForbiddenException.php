<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAudioForbiddenException extends VKApiException {

	/**
	 * VKApiAudioForbiddenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(272, 'The audio file was violating site rules and cannot be reuploaded.', $error);
	}
}
