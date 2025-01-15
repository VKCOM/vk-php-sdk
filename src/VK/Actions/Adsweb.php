<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Adsweb implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Adsweb constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer office_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAdCategories(string $access_token, array $params = [])
	{
		return $this->request->post('adsweb.getAdCategories', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAdUnitCode(string $access_token)
	{
		return $this->request->post('adsweb.getAdUnitCode', $access_token);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer office_id
	 * - @var string sites_ids
	 * - @var string ad_units_ids
	 * - @var string fields
	 * - @var integer limit
	 * - @var integer offset
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAdUnits(string $access_token, array $params = [])
	{
		return $this->request->post('adsweb.getAdUnits', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer office_id
	 * - @var string sites_ids
	 * - @var integer limit
	 * - @var integer offset
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getFraudHistory(string $access_token, array $params = [])
	{
		return $this->request->post('adsweb.getFraudHistory', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer office_id
	 * - @var string sites_ids
	 * - @var string fields
	 * - @var integer limit
	 * - @var integer offset
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSites(string $access_token, array $params = [])
	{
		return $this->request->post('adsweb.getSites', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer office_id
	 * - @var string ids_type
	 * - @var string ids
	 * - @var string period
	 * - @var string date_from
	 * - @var string date_to
	 * - @var string fields
	 * - @var integer limit
	 * - @var string page_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getStatistics(string $access_token, array $params = [])
	{
		return $this->request->post('adsweb.getStatistics', $access_token, $params);
	}
}

