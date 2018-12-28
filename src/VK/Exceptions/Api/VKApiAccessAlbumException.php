<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAccessAlbumException extends VKApiException {

	/**
	 * VKApiAccessAlbumException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(200, 'Access denied', $error);
	}
}
