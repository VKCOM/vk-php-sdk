<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiStickersNotFavoriteException;
use VK\Exceptions\Api\VKApiStickersNotPurchasedException;
use VK\Exceptions\Api\VKApiStickersTooManyFavoritesException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Store implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Store constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Adds given sticker IDs to the list of user's favorite stickers
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] sticker_ids: Sticker IDs to be added
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiStickersNotPurchasedException Stickers are not purchased
	 * @throws VKApiStickersTooManyFavoritesException Too many favorite stickers
	 */
	public function addStickersToFavorite(string $access_token, array $params = [])
	{
		return $this->request->post('store.addStickersToFavorite', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getFavoriteStickers(string $access_token)
	{
		return $this->request->post('store.getFavoriteStickers', $access_token);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string type
	 * - @var string merchant
	 * - @var string section
	 * - @var array[integer] product_ids
	 * - @var array[string] filters
	 * - @var boolean extended
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getProducts(string $access_token, array $params = [])
	{
		return $this->request->post('store.getProducts', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] stickers_ids
	 * - @var array[integer] products_ids
	 * - @var boolean aliases
	 * - @var boolean all_products
	 * - @var boolean need_stickers
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getStickersKeywords(string $access_token, array $params = [])
	{
		return $this->request->post('store.getStickersKeywords', $access_token, $params);
	}


	/**
	 * Removes given sticker IDs from the list of user's favorite stickers
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] sticker_ids: Sticker IDs to be removed
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiStickersNotFavoriteException Stickers are not favorite
	 */
	public function removeStickersFromFavorite(string $access_token, array $params = [])
	{
		return $this->request->post('store.removeStickersFromFavorite', $access_token, $params);
	}
}

