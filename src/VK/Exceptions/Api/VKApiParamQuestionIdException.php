<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class VKApiParamQuestionIdException extends VKApiException {

	/**
	 * VKApiParamQuestionIdException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		return parent::__construct(131, 'Question is not found', $error);
	}
}
