<?php
namespace VK\Actions;

use VK\Actions\Enums\AppWidgetsType;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\Api\VKApiCompileException;
use VK\Exceptions\Api\VKApiParamGroupIdException;
use VK\Exceptions\Api\VKApiRuntimeException;
use VK\Exceptions\Api\VKApiWallAccessPostException;
use VK\Exceptions\Api\VKApiWallAccessRepliesException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class AppWidgets {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * AppWidgets constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
   * Returns URL to upload an app widget photo.
   *
   * @param string $access_token
   * @param array $params
   * - @var string image_type: Type of image. Values: *'24x24',, *'50x50',, *'160x160',, *'160x240',, *'510x128'
   * @throws VKClientException
   * @throws VKApiException
   * @throws VKApiCompileException Unable to compile code
   * @throws VKApiRuntimeException Runtime error occurred during code invocation
   * @return mixed
   */
	public function getAppImageUploadServer($access_token, $params = []) {
      return $this->request->post('appWidgets.getAppImageUploadServer', $access_token, $params);
  }

  /**
   * Returns a collection of application images.
   *
   * @param string $access_token
   * @param array $params
   * - @var integer offset: Offset needed to return a specific subset of images.
   * - @var integer count: Number of objects to return.
   * - @var string image_type: Type of image. Values: *'24x24',, *'50x50',, *'160x160',, *'160x240',, *'510x128'
   * @throws VKClientException
   * @throws VKApiException
   * @throws VKApiCompileException Unable to compile code
   * @throws VKApiRuntimeException Runtime error occurred during code invocation
   * @return mixed
   */
    public function getAppImages($access_token, $params = []) {
        return $this->request->post('appWidgets.getAppImages', $access_token, $params);
    }

  /**
   * Returns the server address for community photo upload.
   *
   * @param string $access_token
   * @param array $params
   * - @var string image_type: Type of image. Values: *'24x24',, *'50x50',, *'160x160',, *'160x240',, *'510x128'
   * @throws VKClientException
   * @throws VKApiException
   * @throws VKApiCompileException Unable to compile code
   * @throws VKApiRuntimeException Runtime error occurred during code invocation
   * @return mixed
   */
    public function getGroupImageUploadServer($access_token, $params = []) {
        return $this->request->post('appWidgets.getGroupImageUploadServer', $access_token, $params);
    }

    /**
     * Returns a collection of application images.
     *
     * @param string $access_token
     * @param array $params
     * - @var integer offset: Offset needed to return a specific subset of images.
     * - @var integer count: Number of objects to return.
     * - @var string image_type: Type of image. Values: *'24x24',, *'50x50',, *'160x160',, *'160x240',, *'510x128'
     * @throws VKClientException
     * @throws VKApiException
     * @throws VKApiCompileException Unable to compile code
     * @throws VKApiRuntimeException Runtime error occurred during code invocation
     * @return mixed
     */
    public function getGroupImages($access_token, $params = []) {
        return $this->request->post('appWidgets.getGroupImages', $access_token, $params);
    }

    /**
     * Returns a collection of application images by id.
     *
     * @param string $access_token
     * @param array $params
     * - @var array[string] images: List of images ID
     * @throws VKClientException
     * @throws VKApiException
     * @throws VKApiCompileException Unable to compile code
     * @throws VKApiRuntimeException Runtime error occurred during code invocation
     * @return mixed
     */
    public function getGroupImagesById($access_token, $params = []) {
        return $this->request->post('appWidgets.getGroupImagesById', $access_token, $params);
    }

    /**
     * Saves app photos after successful uploading.
     *
     * @param string $access_token
     * @param array $params
     * - @var string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     * - @var string image: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     * @throws VKClientException
     * @throws VKApiException
     * @throws VKApiCompileException Unable to compile code
     * @throws VKApiRuntimeException Runtime error occurred during code invocation
     * @return mixed
     */
    public function saveAppImage($access_token, $params = []) {
        return $this->request->post('appWidgets.saveAppImage', $access_token, $params);
    }

    /**
     * Saves app photos into community after successful uploading.
     *
     * @param string $access_token
     * @param array $params
     * - @var string hash: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     * - @var string image: Parameter returned when photos are [vk.com/dev/upload_files|uploaded to server].
     * @throws VKClientException
     * @throws VKApiException
     * @throws VKApiCompileException Unable to compile code
     * @throws VKApiRuntimeException Runtime error occurred during code invocation
     * @return mixed
     */
    public function saveGroupImage($access_token, $params = []) {
        return $this->request->post('appWidgets.saveGroupImage', $access_token, $params);
    }

	/**
	 * Allows to update community app widget
	 *
	 * @param string $access_token
	 * @param array $params
	 * - @var string code
	 * - @var AppWidgetsType type
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiCompileException Unable to compile code
	 * @throws VKApiRuntimeException Runtime error occurred during code invocation
	 * @throws VKApiBlockedException Content blocked
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 * @throws VKApiWallAccessRepliesException Access to post comments denied
	 * @throws VKApiParamGroupIdException Invalid group id
	 * @return mixed
	 */
	public function update($access_token, array $params = []) {
		return $this->request->post('appWidgets.update', $access_token, $params);
	}
}
