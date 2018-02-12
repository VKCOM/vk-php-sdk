<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Fave {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Fave constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a list of users whom the current user has bookmarked.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of users.
     *      - integer count: Number of users to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getUsers(string $access_token, array $params = array()) {
        return $this->request->post('fave.getUsers', $access_token, $params);
    }

    /**
     * Returns a list of photos that the current user has liked.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of photos.
     *      - integer count: Number of photos to return.
     *      - boolean photo_sizes: '1' — to return photo sizes in a [vk.com/dev/photo_sizes|special format].
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getPhotos(string $access_token, array $params = array()) {
        return $this->request->post('fave.getPhotos', $access_token, $params);
    }

    /**
     * Returns a list of wall posts that the current user has liked.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of posts.
     *      - integer count: Number of posts to return.
     *      - boolean extended: '1' — to return additional 'wall', 'profiles', and 'groups' fields. By default:
     *        '0'.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getPosts(string $access_token, array $params = array()) {
        return $this->request->post('fave.getPosts', $access_token, $params);
    }

    /**
     * Returns a list of videos that the current user has liked.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of videos.
     *      - integer count: Number of videos to return.
     *      - boolean extended: Return an additional information about videos. Also returns all owners profiles and
     *        groups.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getVideos(string $access_token, array $params = array()) {
        return $this->request->post('fave.getVideos', $access_token, $params);
    }

    /**
     * Returns a list of links that the current user has bookmarked.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer offset: Offset needed to return a specific subset of users.
     *      - integer count: Number of results to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getLinks(string $access_token, array $params = array()) {
        return $this->request->post('fave.getLinks', $access_token, $params);
    }

    /**
     * Returns market items bookmarked by current user.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer count: Number of results to return.
     *      - boolean extended: '1' – to return additional fields 'likes, can_comment, can_repost, photos'. By
     *        default: '0'.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getMarketItems(string $access_token, array $params = array()) {
        return $this->request->post('fave.getMarketItems', $access_token, $params);
    }

    /**
     * Adds a profile to user faves.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: Profile ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function addUser(string $access_token, array $params = array()) {
        return $this->request->post('fave.addUser', $access_token, $params);
    }

    /**
     * Removes a profile from user faves.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer user_id: Profile ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function removeUser(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeUser', $access_token, $params);
    }

    /**
     * Adds a community to user faves.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function addGroup(string $access_token, array $params = array()) {
        return $this->request->post('fave.addGroup', $access_token, $params);
    }

    /**
     * Removes a community from user faves.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer group_id: Community ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function removeGroup(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeGroup', $access_token, $params);
    }

    /**
     * Adds a link to user faves.
     * 
     * @param $access_token string
     * @param $params array
     *      - string link: Link URL.
     *      - string text: Description text.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function addLink(string $access_token, array $params = array()) {
        return $this->request->post('fave.addLink', $access_token, $params);
    }

    /**
     * Removes link from the user's faves.
     * 
     * @param $access_token string
     * @param $params array
     *      - string link_id: Link ID (can be obtained by [vk.com/dev/faves.getLinks|faves.getLinks] method).
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function removeLink(string $access_token, array $params = array()) {
        return $this->request->post('fave.removeLink', $access_token, $params);
    }
}
