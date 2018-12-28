<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiStickersTooManyFavoritesException extends VKApiException {

	/**
	 * VKApiStickersTooManyFavoritesException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(2101, 'Too many favorite stickers', $error);
	}
}
