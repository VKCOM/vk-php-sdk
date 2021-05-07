<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsObjectDeletedException extends VKApiException {

	/**
	 * VKApiAdsObjectDeletedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(629, 'Object deleted', $error);
	}
}
