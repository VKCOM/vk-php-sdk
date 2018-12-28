<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamQuestionAnswerIdException extends VKApiException {

	/**
	 * VKApiParamQuestionAnswerIdException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(134, 'Answer is not found', $error);
	}
}
