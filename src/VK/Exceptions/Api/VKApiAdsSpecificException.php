<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsSpecificException extends VKApiException {

	/**
	 * VKApiAdsSpecificException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(603, 'Some ads error occured', $error);
	}
}
