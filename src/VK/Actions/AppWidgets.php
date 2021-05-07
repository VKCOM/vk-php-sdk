<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;
use VK\Actions\Enum\AppWidgetsGetAppImageUploadServerImageType;
use VK\Actions\Enum\AppWidgetsGetAppImagesImageType;
use VK\Actions\Enum\AppWidgetsGetGroupImageUploadServerImageType;
use VK\Actions\Enum\AppWidgetsGetGroupImagesImageType;
use VK\Actions\Enum\AppWidgetsUpdateType;

class AppWidgets {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * AppWidgets constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a URL for uploading a photo to the community collection for community app widgets
     *
     * @param $access_token string
     * @param $params array
     *      - AppWidgetsGetAppImageUploadServerImageType image_type:
     *        @see AppWidgetsGetAppImageUploadServerImageType
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getAppImageUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.getAppImageUploadServer', $access_token, $params);
    }

    /**
     * Returns an app collection of images for community app widgets
     *
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of images.
     *      - integer count: Maximum count of results.
     *      - AppWidgetsGetAppImagesImageType image_type:
     *        @see AppWidgetsGetAppImagesImageType
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getAppImages(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.getAppImages', $access_token, $params);
    }

    /**
     * Returns a URL for uploading a photo to the community collection for community app widgets
     *
     * @param $access_token string
     * @param $params array
     *      - AppWidgetsGetGroupImageUploadServerImageType image_type:
     *        @see AppWidgetsGetGroupImageUploadServerImageType
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getGroupImageUploadServer(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.getGroupImageUploadServer', $access_token, $params);
    }

    /**
     * Returns a community collection of images for community app widgets
     *
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of images.
     *      - integer count: Maximum count of results.
     *      - AppWidgetsGetGroupImagesImageType image_type:
     *        @see AppWidgetsGetGroupImagesImageType
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getGroupImages(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.getGroupImages', $access_token, $params);
    }

    /**
     * Returns an image for community app widgets by its ID
     *
     * @param $access_token string
     * @param $params array
     *      - array images: List of images IDs
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getImagesById(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.getImagesById', $access_token, $params);
    }

    /**
     * Allows to save image into app collection for community app widgets
     *
     * @param $access_token string
     * @param $params array
     *      - string hash: Parameter returned when photo is uploaded to server
     *      - string image: Parameter returned when photo is uploaded to server
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function saveAppImage(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.saveAppImage', $access_token, $params);
    }

    /**
     * Allows to save image into community collection for community app widgets
     *
     * @param $access_token string
     * @param $params array
     *      - string hash: Parameter returned when photo is uploaded to server
     *      - string image: Parameter returned when photo is uploaded to server
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function saveGroupImage(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.saveGroupImage', $access_token, $params);
    }

    /**
     * Allows to update community app widget
     *
     * @param $access_token string
     * @param $params array
     *      - string code:
     *      - AppWidgetsUpdateType type:
     *        @see AppWidgetsUpdateType
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function update(string $access_token, array $params = array()) {
        return $this->request->post('appWidgets.update', $access_token, $params);
    }
}
