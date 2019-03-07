<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAlbumFullException extends VKApiException {

	/**
	 * VKApiAlbumFullException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(300, 'This album is full', $error);
	}
}
