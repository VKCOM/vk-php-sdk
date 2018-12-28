<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiAudioAlbumDuplicateException extends VKApiException {

	/**
	 * VKApiAudioAlbumDuplicateException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(271, 'The audio file already exists in the favorites.', $error);
	}
}
