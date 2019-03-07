<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiWallAccessRepliesException extends VKApiException {

	/**
	 * VKApiWallAccessRepliesException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(212, 'Access to post comments denied', $error);
	}
}
