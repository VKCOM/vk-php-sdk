<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Podcasts implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Podcasts constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string search_string
	 * - @var integer offset
	 * - @var integer count
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function searchPodcast(string $access_token, array $params = [])
	{
		return $this->request->post('podcasts.searchPodcast', $access_token, $params);
	}
}

