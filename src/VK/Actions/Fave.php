<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\Api\undefined;
use VK\Actions\Enum\FaveAddTagPosition;
use VK\Actions\Enum\FaveGetItemType;
use VK\Actions\Enum\FaveGetPagesType;
use VK\Actions\Enum\FaveSetTagsItemType;

class Fave {

    /**
     * @var VKApiRequest
     */
    private $request;

    /**
     * Fave constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - string url:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function addArticle(string $access_token, array $params = array()) {
        return $this->request->post('fave.addArticle', $access_token, $params);
    }

    /**
     * Adds a link to user faves.
     *
     * @param $access_token string
     * @param $params array
     *      - string link: Link URL.
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function addLink(string $access_token, array $params = array()) {
        return $this->request->post('fave.addLink', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - integer group_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function addPage(string $access_token, array $params = array()) {
        return $this->request->post('fave.addPage', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer id:
     *      - string access_key:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function addPost(string $access_token, array $params = array()) {
        return $this->request->post('fave.addPost', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer id:
     *      - string access_key:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function addProduct(string $access_token, array $params = array()) {
        return $this->request->post('fave.addProduct', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - string name:
     *      - FaveAddTagPosition position:
     *        @see FaveAddTagPosition
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function addTag(string $access_token, array $params = array()) {
        return $this->request->post('fave.addTag', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer id:
     *      - string access_key:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function addVideo(string $access_token, array $params = array()) {
        return $this->request->post('fave.addVideo', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer id:
     *      - string name:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function editTag(string $access_token, array $params = array()) {
        return $this->request->post('fave.editTag', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - boolean extended: '1' — to return additional 'wall', 'profiles', and 'groups' fields. By default:
     *        '0'.
     *      - FaveGetItemType item_type:
     *        @see FaveGetItemType
     *      - integer tag_id: Tag ID.
     *      - integer offset: Offset needed to return a specific subset of users.
     *      - integer count: Number of users to return.
     *      - string fields:
     *      - boolean is_from_snackbar:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function get(string $access_token, array $params = array()) {
        return $this->request->post('fave.get', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer offset:
     *      - integer count:
     *      - FaveGetPagesType type:
     *        @see FaveGetPagesType
     *      - array fields:
     *      - integer tag_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function getPages(string $access_token, array $params = array()) {
        return $this->request->post('fave.getPages', $access_token, $params);
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
    public function getTags(string $access_token, array $params = array()) {
        return $this->request->post('fave.getTags', $access_token, $params);
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
    public function markSeen(string $access_token, array $params = array()) {
        return $this->request->post('fave.markSeen', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer article_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function removeArticle(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeArticle', $access_token, $params);
    }

    /**
     * Removes link from the user's faves.
     *
     * @param $access_token string
     * @param $params array
     *      - string link_id: Link ID (can be obtained by [vk.com/dev/faves.getLinks|faves.getLinks] method).
     *      - string link: Link URL
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function removeLink(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeLink', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - integer group_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function removePage(string $access_token, array $params = array()) {
        return $this->request->post('fave.removePage', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function removePost(string $access_token, array $params = array()) {
        return $this->request->post('fave.removePost', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function removeProduct(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeProduct', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function removeTag(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeTag', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer owner_id:
     *      - integer id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function removeVideo(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeVideo', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - array ids:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function reorderTags(string $access_token, array $params = array()) {
        return $this->request->post('fave.reorderTags', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - integer group_id:
     *      - array tag_ids:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     *
     */
    public function setPageTags(string $access_token, array $params = array()) {
        return $this->request->post('fave.setPageTags', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - FaveSetTagsItemType item_type:
     *        @see FaveSetTagsItemType
     *      - integer item_owner_id:
     *      - integer item_id:
     *      - array tag_ids:
     *      - string link_id:
     *      - string link_url:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     * @throws undefined
     * @throws undefined
     *
     */
    public function setTags(string $access_token, array $params = array()) {
        return $this->request->post('fave.setTags', $access_token, $params);
    }

    /**
     *
     *
     * @param $access_token string
     * @param $params array
     *      - integer user_id:
     *      - integer group_id:
     *
     * @return mixed
     * @throws VKClientException in case of network error
     * @throws VKApiException in case of API error
     *
     */
    public function trackPageInteraction(string $access_token, array $params = array()) {
        return $this->request->post('fave.trackPageInteraction', $access_token, $params);
    }
}
