<?php
namespace VK\Actions;

use VK\Actions\Enum\StreamingMonthlyTier;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Streaming {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Streaming constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var StreamingMonthlyTier monthly_tier
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function setSettings($access_token, array $params = []) {
		return $this->request->post('streaming.setSettings', $access_token, $params);
	}
}
