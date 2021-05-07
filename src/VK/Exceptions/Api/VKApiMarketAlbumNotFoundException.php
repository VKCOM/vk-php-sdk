<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketAlbumNotFoundException extends VKApiException {

	/**
	 * VKApiMarketAlbumNotFoundException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1402, 'Album not found', $error);
	}
}
