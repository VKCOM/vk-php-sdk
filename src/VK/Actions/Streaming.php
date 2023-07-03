<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\StreamingInterval;
use VK\Enums\StreamingMonthlyTier;
use VK\Enums\StreamingType;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Streaming implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Streaming constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Allows to receive data for the connection to Streaming API.
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getServerUrl(string $access_token)
	{
		return $this->request->post('streaming.getServerUrl', $access_token);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSettings(string $access_token)
	{
		return $this->request->post('streaming.getSettings', $access_token);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var StreamingType type
	 * - @var StreamingInterval interval
	 * - @var integer start_time
	 * - @var integer end_time
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getStats(string $access_token, array $params = [])
	{
		return $this->request->post('streaming.getStats', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string word
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getStem(string $access_token, array $params = [])
	{
		return $this->request->post('streaming.getStem', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var StreamingMonthlyTier monthly_tier
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function setSettings(string $access_token, array $params = [])
	{
		return $this->request->post('streaming.setSettings', $access_token, $params);
	}
}

