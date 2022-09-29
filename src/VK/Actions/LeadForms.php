<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;

class LeadForms
{
    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Groups constructor.
     *
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param $access_token
     * @param array $params
     * @return array|mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function create($access_token, array $params = [])
    {
        return $this->request->post('leadForms.create', $access_token, $params);
    }

    /**
     * @param $access_token
     * @param array $params
     * @return array|mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function delete($access_token, array $params = [])
    {
        return $this->request->post('leadForms.delete', $access_token, $params);
    }

    /**
     * @param $access_token
     * @param array $params
     * @return array|mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function get($access_token, array $params = [])
    {
        return $this->request->post('leadForms.get', $access_token, $params);
    }

    /**
     * @param $access_token
     * @param array $params
     * @return array|mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function getLeads($access_token, array $params = [])
    {
        return $this->request->post('leadForms.getLeads', $access_token, $params);
    }

    /**
     * @param $access_token
     * @return array|mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function getUploadURL($access_token)
    {
        return $this->request->post('leadForms.getUploadURL', $access_token);
    }

    /**
     * @param $access_token
     * @param array $params
     * @return array|mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function list($access_token, array $params = [])
    {
        return $this->request->post('leadForms.list', $access_token, $params);
    }

    /**
     * @param $access_token
     * @param array $params
     * @return array|mixed
     * @throws \VK\Exceptions\VKApiException
     * @throws \VK\Exceptions\VKClientException
     */
    public function update($access_token, array $params = [])
    {
        return $this->request->post('leadForms.update', $access_token, $params);
    }
}
