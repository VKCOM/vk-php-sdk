<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamAlbumIdException extends VKApiException {

	/**
	 * VKApiParamAlbumIdException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(114, 'Invalid album id', $error);
	}
}
