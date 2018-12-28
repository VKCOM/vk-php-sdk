<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamQuestionLimitException extends VKApiException {

	/**
	 * VKApiParamQuestionLimitException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(133, 'Question number limit is reached', $error);
	}
}
