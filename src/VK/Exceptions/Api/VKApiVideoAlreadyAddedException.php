<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiVideoAlreadyAddedException extends VKApiException {

	/**
	 * VKApiVideoAlreadyAddedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(800, 'This video is already added', $error);
	}
}
