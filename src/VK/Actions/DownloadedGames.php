<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiActionFailedException;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class DownloadedGames implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * DownloadedGames constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiActionFailedException Unable to process action
	 * @throws VKApiNotFoundException Not found
	 */
	public function getPaidStatus(string $access_token, array $params = [])
	{
		return $this->request->post('downloadedGames.getPaidStatus', $access_token, $params);
	}
}

