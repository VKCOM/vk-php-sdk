<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\BugtrackerFilterRole;
use VK\Enums\BugtrackerRole;
use VK\Exceptions\Api\VKApiActionFailedException;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\Api\VKApiParamPhotosException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Bugtracker implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Bugtracker constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer company_id
	 * - @var array[integer] user_ids
	 * - @var array[integer] company_group_ids
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiLimitsException Out of limits
	 */
	public function addCompanyGroupsMembers(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.addCompanyGroupsMembers', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] user_ids
	 * - @var integer company_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiLimitsException Out of limits
	 */
	public function addCompanyMembers(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.addCompanyMembers', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer bugreport_id
	 * - @var integer status
	 * - @var string comment
	 * - @var array[integer] from_statuses
	 * - @var array[integer] not_in_statuses
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiActionFailedException Unable to process action
	 */
	public function changeBugreportStatus(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.changeBugreportStatus', $access_token, $params);
	}


	/**
	 * Creates the comment to bugreport
	 * @param string $access_token
	 * @param array $params
	 * - @var integer bugreport_id
	 * - @var string text
	 * - @var boolean hidden
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiParamPhotosException Invalid photos
	 */
	public function createComment(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.createComment', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer company_id
	 * - @var integer company_group_id
	 * - @var integer count
	 * - @var integer offset
	 * - @var string filter_name
	 * - @var boolean extended
	 * - @var array[BugtrackerFields] fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiLimitsException Out of limits
	 */
	public function getCompanyGroupMembers(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.getCompanyGroupMembers', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer company_id
	 * - @var integer count
	 * - @var integer offset
	 * - @var string filter_name
	 * - @var BugtrackerFilterRole filter_role
	 * - @var integer filter_not_group
	 * - @var boolean extended
	 * - @var array[BugtrackerFields] fields
	 * - @var boolean extra
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiLimitsException Out of limits
	 */
	public function getCompanyMembers(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.getCompanyMembers', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer product_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function getProductBuildUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.getProductBuildUploadServer', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer company_id
	 * - @var integer user_id
	 * - @var integer company_group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiLimitsException Out of limits
	 */
	public function removeCompanyGroupMember(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.removeCompanyGroupMember', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer company_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 */
	public function removeCompanyMember(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.removeCompanyMember', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer product_id
	 * - @var integer version_id
	 * - @var string title
	 * - @var string release_notes
	 * - @var boolean visible
	 * - @var boolean set_rft
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function saveProductVersion(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.saveProductVersion', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id
	 * - @var integer company_id
	 * - @var BugtrackerRole role
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiLimitsException Out of limits
	 */
	public function setCompanyMemberRole(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.setCompanyMemberRole', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer product_id
	 * - @var boolean is_over
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiActionFailedException Unable to process action
	 */
	public function setProductIsOver(string $access_token, array $params = [])
	{
		return $this->request->post('bugtracker.setProductIsOver', $access_token, $params);
	}
}

