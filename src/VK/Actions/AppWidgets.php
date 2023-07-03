<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\AppWidgetsImageType;
use VK\Enums\AppWidgetsType;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\Api\VKApiCompileException;
use VK\Exceptions\Api\VKApiParamGroupIdException;
use VK\Exceptions\Api\VKApiParamPhotoException;
use VK\Exceptions\Api\VKApiWallAccessPostException;
use VK\Exceptions\Api\VKApiWallAccessRepliesException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class AppWidgets implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * AppWidgets constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Returns a URL for uploading a photo to the community collection for community app widgets
	 * @param string $access_token
	 * @param array $params
	 * - @var AppWidgetsImageType image_type
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAppImageUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.getAppImageUploadServer', $access_token, $params);
	}


	/**
	 * Returns an app collection of images for community app widgets
	 * @param string $access_token
	 * @param array $params
	 * - @var integer offset: Offset needed to return a specific subset of images.
	 * - @var integer count: Maximum count of results.
	 * - @var AppWidgetsImageType image_type
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAppImages(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.getAppImages', $access_token, $params);
	}


	/**
	 * Returns a URL for uploading a photo to the community collection for community app widgets
	 * @param string $access_token
	 * @param array $params
	 * - @var AppWidgetsImageType image_type
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getGroupImageUploadServer(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.getGroupImageUploadServer', $access_token, $params);
	}


	/**
	 * Returns a community collection of images for community app widgets
	 * @param string $access_token
	 * @param array $params
	 * - @var integer offset: Offset needed to return a specific subset of images.
	 * - @var integer count: Maximum count of results.
	 * - @var AppWidgetsImageType image_type
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getGroupImages(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.getGroupImages', $access_token, $params);
	}


	/**
	 * Returns an image for community app widgets by its ID
	 * @param string $access_token
	 * @param array $params
	 * - @var array[string] images: List of images IDs
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getImagesById(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.getImagesById', $access_token, $params);
	}


	/**
	 * Allows to save image into app collection for community app widgets
	 * @param string $access_token
	 * @param array $params
	 * - @var string hash: Parameter returned when photo is uploaded to server
	 * - @var string image: Parameter returned when photo is uploaded to server
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamPhotoException Invalid photo
	 */
	public function saveAppImage(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.saveAppImage', $access_token, $params);
	}


	/**
	 * Allows to save image into community collection for community app widgets
	 * @param string $access_token
	 * @param array $params
	 * - @var string hash: Parameter returned when photo is uploaded to server
	 * - @var string image: Parameter returned when photo is uploaded to server
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamPhotoException Invalid photo
	 */
	public function saveGroupImage(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.saveGroupImage', $access_token, $params);
	}


	/**
	 * Allows to update community app widget
	 * @param string $access_token
	 * @param array $params
	 * - @var string code
	 * - @var AppWidgetsType type
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiCompileException Unable to compile code
	 * @throws VKApiBlockedException Content blocked
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 * @throws VKApiWallAccessRepliesException Access to post comments denied
	 * @throws VKApiParamGroupIdException Invalid group id
	 */
	public function update(string $access_token, array $params = [])
	{
		return $this->request->post('appWidgets.update', $access_token, $params);
	}
}

