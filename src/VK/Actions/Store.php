<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;

class Store {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Store constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Adds given sticker IDs to the list of user's favorite stickers
     *
     * @param $access_token string
     * @param $params array
     *      - array sticker_ids: Sticker IDs to be added
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function addStickersToFavorite(string $access_token, array $params = array()) {
        return $this->request->post('store.addStickersToFavorite', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getFavoriteStickers(string $access_token, array $params = array()) {
        return $this->request->post('store.getFavoriteStickers', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - string type:
     *      - string merchant:
     *      - string section:
     *      - array product_ids:
     *      - array filters:
     *      - boolean extended:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getProducts(string $access_token, array $params = array()) {
        return $this->request->post('store.getProducts', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - array stickers_ids:
     *      - array products_ids:
     *      - boolean aliases:
     *      - boolean all_products:
     *      - boolean need_stickers:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getStickersKeywords(string $access_token, array $params = array()) {
        return $this->request->post('store.getStickersKeywords', $access_token, $params);
    }

    /**
     * Removes given sticker IDs from the list of user's favorite stickers
     *
     * @param $access_token string
     * @param $params array
     *      - array sticker_ids: Sticker IDs to be removed
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function removeStickersFromFavorite(string $access_token, array $params = array()) {
        return $this->request->post('store.removeStickersFromFavorite', $access_token, $params);
    }
}
