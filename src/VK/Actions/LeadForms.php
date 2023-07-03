<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class LeadForms implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * LeadForms constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var string name
	 * - @var string title
	 * - @var string description
	 * - @var string questions
	 * - @var string policy_link_url
	 * - @var string photo
	 * - @var string confirmation
	 * - @var string site_link_url
	 * - @var boolean active
	 * - @var boolean once_per_user
	 * - @var string pixel_code
	 * - @var array[integer] notify_admins
	 * - @var array[string] notify_emails
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function create(string $access_token, array $params = [])
	{
		return $this->request->post('leadForms.create', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer form_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function delete(string $access_token, array $params = [])
	{
		return $this->request->post('leadForms.delete', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer form_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('leadForms.get', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer form_id
	 * - @var integer limit
	 * - @var string next_page_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function getLeads(string $access_token, array $params = [])
	{
		return $this->request->post('leadForms.getLeads', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getUploadURL(string $access_token)
	{
		return $this->request->post('leadForms.getUploadURL', $access_token);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function list(string $access_token, array $params = [])
	{
		return $this->request->post('leadForms.list', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer form_id
	 * - @var string name
	 * - @var string title
	 * - @var string description
	 * - @var string questions
	 * - @var string policy_link_url
	 * - @var string photo
	 * - @var string confirmation
	 * - @var string site_link_url
	 * - @var boolean active
	 * - @var boolean once_per_user
	 * - @var string pixel_code
	 * - @var array[integer] notify_admins
	 * - @var array[string] notify_emails
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function update(string $access_token, array $params = [])
	{
		return $this->request->post('leadForms.update', $access_token, $params);
	}
}

