<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWallLinksForbiddenException extends VKApiException {

	/**
	 * VKApiWallLinksForbiddenException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(222, 'Hyperlinks are forbidden', $error);
	}
}
