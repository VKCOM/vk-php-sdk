<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;
use VK\Actions\Enums\PlacesSearchRadius;

class Places {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Places constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Adds a new location to the location database.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer type: ID of the location's type (e.g., '1' — Home, '2' — Work). To get location type IDs,
     *        use the [vk.com/dev/places.getTypes|places.getTypes] method.
     *      - string title: Title of the location.
     *      - number latitude: Geographical latitude, in degrees (from '-90' to '90').
     *      - number longitude: Geographical longitude, in degrees (from '-180' to '180').
     *      - integer country: ID of the location's country. To get country IDs, use the
     *        [vk.com/dev/database.getCountries|database.getCountries] method.
     *      - integer city: ID of the location's city. To get city IDs, use the
     *        [vk.com/dev/database.getCities|database.getCities] method.
     *      - string address: Street address of the location (e.g., '125 Elm Street').
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function add(string $access_token, array $params = array()) {
        return $this->request->post('places.add', $access_token, $params);
    }

    /**
     * Returns information about locations by their IDs.
     * 
     * @param $access_token string
     * @param $params array
     *      - array places: Location IDs.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getById(string $access_token, array $params = array()) {
        return $this->request->post('places.getById', $access_token, $params);
    }

    /**
     * Returns a list of locations that match the search criteria.
     * 
     * @param $access_token string
     * @param $params array
     *      - string q: Search query string.
     *      - integer city: City ID.
     *      - number latitude: Geographical latitude of the initial search point, in degrees (from '-90' to '90').
     *      - number longitude: Geographical longitude of the initial search point, in degrees (from '-180' to
     *        '180').
     *      - PlacesSearchRadius radius: Radius of the search zone: '1' — 100 m. (default), '2' — 800 m. '3'
     *        — 6 km. '4' — 50 km.
     *        @see PlacesSearchRadius
     *      - integer offset: Offset needed to return a specific subset of locations.
     *      - integer count: Number of locations to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function search(string $access_token, array $params = array()) {
        return $this->request->post('places.search', $access_token, $params);
    }

    /**
     * Checks a user in at the specified location.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer place_id: Location ID.
     *      - string text: Text of the comment on the check-in (255 characters maximum, line breaks not supported).
     *      - number latitude: Geographical latitude of the check-in, in degrees (from '-90' to '90').
     *      - number longitude: Geographical longitude of the check-in, in degrees (from '-180' to '180').
     *      - boolean friends_only: '1' — Check-in will be available only for friends. '0' — Check-in will be
     *        available for all users (default).
     *      - array services: List of services or websites (e.g., 'twitter', 'facebook') to which the check-in will
     *        be exported, if the user has set up the respective option.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function checkin(string $access_token, array $params = array()) {
        return $this->request->post('places.checkin', $access_token, $params);
    }

    /**
     * Returns a list of user check-ins at locations according to the set parameters.
     * 
     * @param $access_token string
     * @param $params array
     *      - number latitude: Geographical latitude of the initial search point, in degrees (from '-90' to '90').
     *      - number longitude: Geographical longitude of the initial search point, in degrees (from '-180' to
     *        '180').
     *      - integer place: Location ID of check-ins to return. (Ignored if 'latitude' and 'longitude' are
     *        specified.)
     *      - integer user_id:
     *      - integer offset: Offset needed to return a specific subset of check-ins. (Ignored if 'timestamp' is
     *        not null.)
     *      - integer count: Number of check-ins to return. (Ignored if 'timestamp' is not null.)
     *      - integer timestamp: Specifies that only those check-ins created after the specified timestamp will be
     *        returned.
     *      - boolean friends_only: '1' — to return only check-ins with set geographical coordinates. (Ignored if
     *        'latitude' and 'longitude' are not set.)
     *      - boolean need_places: '1' — to return location information with the check-ins. (Ignored if 'place'
     *        is not set.),
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getCheckins(string $access_token, array $params = array()) {
        return $this->request->post('places.getCheckins', $access_token, $params);
    }

    /**
     * Returns a list of all types of locations.
     * 
     * @param $access_token string
     * @param $params array
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getTypes(string $access_token, array $params = array()) {
        return $this->request->post('places.getTypes', $access_token, $params);
    }
}
