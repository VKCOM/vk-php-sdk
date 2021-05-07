<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;
use VK\Actions\Enum\MarketEditOrderPaymentStatus;
use VK\Actions\Enum\MarketGetCommentsSort;
use VK\Actions\Enum\MarketReportReason;
use VK\Actions\Enum\MarketReportCommentReason;
use VK\Actions\Enum\MarketSearchSort;
use VK\Actions\Enum\MarketSearchRev;
use VK\Actions\Enum\MarketSearchStatus;

class Market {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Market constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Ads a new item to the market.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - string name: Item name.
     *      - string description: Item description.
     *      - integer category_id: Item category ID.
     *      - number price: Item price.
     *      - number old_price:
     *      - boolean deleted: Item status ('1' — deleted, '0' — not deleted).
     *      - integer main_photo_id: Cover photo ID.
     *      - array photo_ids: IDs of additional photos.
     *      - string url: Url for button in market item.
     *      - integer dimension_width:
     *      - integer dimension_height:
     *      - integer dimension_length:
     *      - integer weight:
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
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function add(string $access_token, array $params = array()) {
        return $this->request->post('market.add', $access_token, $params);
    }

    /**
     * Creates new collection of items
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - string title: Collection title.
     *      - integer photo_id: Cover photo ID.
     *      - boolean main_album: Set as main ('1' - set, '0' - no).
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function addAlbum(string $access_token, array $params = array()) {
        return $this->request->post('market.addAlbum', $access_token, $params);
    }

    /**
     * Adds an item to one or multiple collections.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer item_id: Item ID.
     *      - array album_ids: Collections IDs to add item to.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function addToAlbum(string $access_token, array $params = array()) {
        return $this->request->post('market.addToAlbum', $access_token, $params);
    }

    /**
     * Creates a new comment for an item.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer item_id: Item ID.
     *      - string message: Comment text (required if 'attachments' parameter is not specified)
     *      - array attachments: Comma-separated list of objects attached to a comment. The field is submitted the
     *        following way: , "'<owner_id>_<media_id>,<owner_id>_<media_id>'", , '' - media attachment type: "'photo' -
     *        photo, 'video' - video, 'audio' - audio, 'doc' - document", , '<owner_id>' - media owner id, '<media_id>' -
     *        media attachment id, , For example: "photo100172_166443618,photo66748_265827614",
     *      - boolean from_group: '1' - comment will be published on behalf of a community, '0' - on behalf of a
     *        user (by default).
     *      - integer reply_to_comment: ID of a comment to reply with current comment to.
     *      - integer sticker_id: Sticker ID.
     *      - string guid: Random value to avoid resending one comment.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function createComment(string $access_token, array $params = array()) {
        return $this->request->post('market.createComment', $access_token, $params);
    }

    /**
     * Deletes an item.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer item_id: Item ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function delete(string $access_token, array $params = array()) {
        return $this->request->post('market.delete', $access_token, $params);
    }

    /**
     * Deletes a collection of items.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an collection owner community.
     *      - integer album_id: Collection ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function deleteAlbum(string $access_token, array $params = array()) {
        return $this->request->post('market.deleteAlbum', $access_token, $params);
    }

    /**
     * Deletes an item's comment
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: identifier of an item owner community, "Note that community id in the 'owner_id'
     *        parameter should be negative number. For example 'owner_id'=-1 matches the [vk.com/apiclub|VK API] community
     *        "
     *      - integer comment_id: comment id
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function deleteComment(string $access_token, array $params = array()) {
        return $this->request->post('market.deleteComment', $access_token, $params);
    }

    /**
     * Edits an item.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer item_id: Item ID.
     *      - string name: Item name.
     *      - string description: Item description.
     *      - integer category_id: Item category ID.
     *      - number price: Item price.
     *      - boolean deleted: Item status ('1' — deleted, '0' — not deleted).
     *      - integer main_photo_id: Cover photo ID.
     *      - array photo_ids: IDs of additional photos.
     *      - string url: Url for button in market item.
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
     * @throws undefined
     * @throws undefined
     *
     */
    public function edit(string $access_token, array $params = array()) {
        return $this->request->post('market.edit', $access_token, $params);
    }

    /**
     * Edits a collection of items
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an collection owner community.
     *      - integer album_id: Collection ID.
     *      - string title: Collection title.
     *      - integer photo_id: Cover photo id
     *      - boolean main_album: Set as main ('1' - set, '0' - no).
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function editAlbum(string $access_token, array $params = array()) {
        return $this->request->post('market.editAlbum', $access_token, $params);
    }

    /**
     * Chages item comment's text
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer comment_id: Comment ID.
     *      - string message: New comment text (required if 'attachments' are not specified), , 2048 symbols
     *        maximum.
     *      - array attachments: Comma-separated list of objects attached to a comment. The field is submitted the
     *        following way: , "'<owner_id>_<media_id>,<owner_id>_<media_id>'", , '' - media attachment type: "'photo' -
     *        photo, 'video' - video, 'audio' - audio, 'doc' - document", , '<owner_id>' - media owner id, '<media_id>' -
     *        media attachment id, , For example: "photo100172_166443618,photo66748_265827614",
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function editComment(string $access_token, array $params = array()) {
        return $this->request->post('market.editComment', $access_token, $params);
    }

    /**
     * Edit order
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - integer order_id:
     *      - string merchant_comment:
     *      - integer status:
     *      - string track_number:
     *      - MarketEditOrderPaymentStatus payment_status:
     *        @see MarketEditOrderPaymentStatus
     *      - integer delivery_price:
     *      - integer width:
     *      - integer length:
     *      - integer height:
     *      - integer weight:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function editOrder(string $access_token, array $params = array()) {
        return $this->request->post('market.editOrder', $access_token, $params);
    }

    /**
     * Returns items list for a community.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community, "Note that community id in the 'owner_id' parameter
     *        should be negative number. For example 'owner_id'=-1 matches the [vk.com/apiclub|VK API] community "
     *      - integer album_id:
     *      - integer count: Number of items to return.
     *      - integer offset: Offset needed to return a specific subset of results.
     *      - boolean extended: '1' - method will return additional fields: 'likes, can_comment, car_repost,
     *        photos'. These parameters are not returned by default.
     *      - string date_from: Items update date from (format: yyyy-mm-dd)
     *      - string date_to: Items update date to (format: yyyy-mm-dd)
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('market.get', $access_token, $params);
    }

    /**
     * Returns items album's data
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: identifier of an album owner community, "Note that community id in the 'owner_id'
     *        parameter should be negative number. For example 'owner_id'=-1 matches the [vk.com/apiclub|VK API] community
     *        "
     *      - array album_ids: collections identifiers to obtain data from
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getAlbumById(string $access_token, array $params = array()) {
        return $this->request->post('market.getAlbumById', $access_token, $params);
    }

    /**
     * Returns community's market collections list.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an items owner community.
     *      - integer offset: Offset needed to return a specific subset of results.
     *      - integer count: Number of items to return.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getAlbums(string $access_token, array $params = array()) {
        return $this->request->post('market.getAlbums', $access_token, $params);
    }

    /**
     * Returns information about market items by their ids.
     *
     * @param $access_token string
     * @param $params array
     *      - array item_ids: Comma-separated ids list: {user id}_{item id}. If an item belongs to a community
     *        -{community id} is used. " 'Videos' value example: , '-4363_136089719,13245770_137352259'"
     *      - boolean extended: '1' - to return additional fields: 'likes, can_comment, car_repost, photos'. By
     *        default: '0'.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('market.getById', $access_token, $params);
    }

    /**
     * Returns a list of market categories.
     *
     * @param $access_token string
     * @param $params array
     *      - integer count: Number of results to return.
     *      - integer offset: Offset needed to return a specific subset of results.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getCategories(string $access_token, array $params = array()) {
        return $this->request->post('market.getCategories', $access_token, $params);
    }

    /**
     * Returns comments list for an item.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community
     *      - integer item_id: Item ID.
     *      - boolean need_likes: '1' — to return likes info.
     *      - integer start_comment_id: ID of a comment to start a list from (details below).
     *      - integer offset:
     *      - integer count: Number of results to return.
     *      - MarketGetCommentsSort sort: Sort order ('asc' — from old to new, 'desc' — from new to old)
     *        @see MarketGetCommentsSort
     *      - boolean extended: '1' — comments will be returned as numbered objects, in addition lists of
     *        'profiles' and 'groups' objects will be returned.
     *      - array fields: List of additional profile fields to return. See the [vk.com/dev/fields|details]
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function getComments(string $access_token, array $params = array()) {
        return $this->request->post('market.getComments', $access_token, $params);
    }

    /**
     * Get market orders
     *
     * @param $access_token string
     * @param $params array
     *      - integer group_id:
     *      - integer offset:
     *      - integer count:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function getGroupOrders(string $access_token, array $params = array()) {
        return $this->request->post('market.getGroupOrders', $access_token, $params);
    }

    /**
     * Get order
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - integer order_id:
     *      - boolean extended:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getOrderById(string $access_token, array $params = array()) {
        return $this->request->post('market.getOrderById', $access_token, $params);
    }

    /**
     * Get market items in the order
     *
     * @param $access_token string
     * @param $params array
     *      - integer order_id:
     *      - integer offset:
     *      - integer count:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getOrderItems(string $access_token, array $params = array()) {
        return $this->request->post('market.getOrderItems', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer offset:
     *      - integer count:
     *      - boolean extended:
     *      - string date_from: Orders status updated date from (format: yyyy-mm-dd)
     *      - string date_to: Orders status updated date to (format: yyyy-mm-dd)
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getOrders(string $access_token, array $params = array()) {
        return $this->request->post('market.getOrders', $access_token, $params);
    }

    /**
     * Removes an item from one or multiple collections.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer item_id: Item ID.
     *      - array album_ids: Collections IDs to remove item from.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function removeFromAlbum(string $access_token, array $params = array()) {
        return $this->request->post('market.removeFromAlbum', $access_token, $params);
    }

    /**
     * Reorders the collections list.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer album_id: Collection ID.
     *      - integer before: ID of a collection to place current collection before it.
     *      - integer after: ID of a collection to place current collection after it.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function reorderAlbums(string $access_token, array $params = array()) {
        return $this->request->post('market.reorderAlbums', $access_token, $params);
    }

    /**
     * Changes item place in a collection.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer album_id: ID of a collection to reorder items in. Set 0 to reorder full items list.
     *      - integer item_id: Item ID.
     *      - integer before: ID of an item to place current item before it.
     *      - integer after: ID of an item to place current item after it.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function reorderItems(string $access_token, array $params = array()) {
        return $this->request->post('market.reorderItems', $access_token, $params);
    }

    /**
     * Sends a complaint to the item.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer item_id: Item ID.
     *      - MarketReportReason reason: Complaint reason. Possible values: *'0' — spam,, *'1' — child porn,,
     *        *'2' — extremism,, *'3' — violence,, *'4' — drugs propaganda,, *'5' — adult materials,, *'6' —
     *        insult.
     *        @see MarketReportReason
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function report(string $access_token, array $params = array()) {
        return $this->request->post('market.report', $access_token, $params);
    }

    /**
     * Sends a complaint to the item's comment.
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer comment_id: Comment ID.
     *      - MarketReportCommentReason reason: Complaint reason. Possible values: *'0' — spam,, *'1' — child
     *        porn,, *'2' — extremism,, *'3' — violence,, *'4' — drugs propaganda,, *'5' — adult materials,, *'6'
     *        — insult.
     *        @see MarketReportCommentReason
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function reportComment(string $access_token, array $params = array()) {
        return $this->request->post('market.reportComment', $access_token, $params);
    }

    /**
     * Restores recently deleted item
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an item owner community.
     *      - integer item_id: Deleted item ID.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     * @throws undefined
     *
     */
    public function restore(string $access_token, array $params = array()) {
        return $this->request->post('market.restore', $access_token, $params);
    }

    /**
     * Restores a recently deleted comment
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: identifier of an item owner community, "Note that community id in the 'owner_id'
     *        parameter should be negative number. For example 'owner_id'=-1 matches the [vk.com/apiclub|VK API] community
     *        "
     *      - integer comment_id: deleted comment id
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function restoreComment(string $access_token, array $params = array()) {
        return $this->request->post('market.restoreComment', $access_token, $params);
    }

    /**
     * Searches market items in a community's catalog
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id: ID of an items owner community.
     *      - integer album_id:
     *      - string q: Search query, for example "pink slippers".
     *      - integer price_from: Minimum item price value.
     *      - integer price_to: Maximum item price value.
     *      - MarketSearchSort sort:
     *        @see MarketSearchSort
     *      - MarketSearchRev rev: '0' — do not use reverse order, '1' — use reverse order
     *        @see MarketSearchRev
     *      - integer offset: Offset needed to return a specific subset of results.
     *      - integer count: Number of items to return.
     *      - boolean extended: '1' - to return additional fields: 'likes, can_comment, car_repost, photos'. By
     *        default: '0'.
     *      - MarketSearchStatus status:
     *        @see MarketSearchStatus
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function search(string $access_token, array $params = array()) {
        return $this->request->post('market.search', $access_token, $params);
    }
}
