<?php

namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKClientException;
use VK\Exceptions\Api\VKApiException;

class Database {

    /**
     * @var VKApiRequest
     **/
    private $request;

    /**
     * Database constructor.
     * @param VKApiRequest $request
     */
    public function __construct(VKApiRequest $request) {
        $this->request = $request;
    }

    /**
     * Returns a list of countries.
     * 
     * @param $access_token string
     * @param $params array
     *      - boolean need_all: '1' — to return a full list of all countries, '0' — to return a list of
     *        countries near the current user's country (default).
     *      - string code: Country codes in [vk.com/dev/country_codes|ISO 3166-1 alpha-2] standard.
     *      - integer offset: Offset needed to return a specific subset of countries.
     *      - integer count: Number of countries to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getCountries(string $access_token, array $params = array()) {
        return $this->request->post('database.getCountries', $access_token, $params);
    }

    /**
     * Returns a list of regions.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer country_id: Country ID, received in [vk.com/dev/database.getCountries|database.getCountries]
     *        method.
     *      - string q: Search query.
     *      - integer offset: Offset needed to return specific subset of regions.
     *      - integer count: Number of regions to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getRegions(string $access_token, array $params = array()) {
        return $this->request->post('database.getRegions', $access_token, $params);
    }

    /**
     * Returns information about streets by their IDs.
     * 
     * @param $access_token string
     * @param $params array
     *      - array street_ids: Street IDs.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getStreetsById(string $access_token, array $params = array()) {
        return $this->request->post('database.getStreetsById', $access_token, $params);
    }

    /**
     * Returns information about countries by their IDs.
     * 
     * @param $access_token string
     * @param $params array
     *      - array country_ids: Country IDs.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getCountriesById(string $access_token, array $params = array()) {
        return $this->request->post('database.getCountriesById', $access_token, $params);
    }

    /**
     * Returns a list of cities.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer country_id: Country ID.
     *      - integer region_id: Region ID.
     *      - string q: Search query.
     *      - boolean need_all: '1' — to return all cities in the country, '0' — to return major cities in the
     *        country (default),
     *      - integer offset: Offset needed to return a specific subset of cities.
     *      - integer count: Number of cities to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getCities(string $access_token, array $params = array()) {
        return $this->request->post('database.getCities', $access_token, $params);
    }

    /**
     * Returns information about cities by their IDs.
     * 
     * @param $access_token string
     * @param $params array
     *      - array city_ids: City IDs.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getCitiesById(string $access_token, array $params = array()) {
        return $this->request->post('database.getCitiesById', $access_token, $params);
    }

    /**
     * Returns a list of higher education institutions.
     * 
     * @param $access_token string
     * @param $params array
     *      - string q: Search query.
     *      - integer country_id: Country ID.
     *      - integer city_id: City ID.
     *      - integer offset: Offset needed to return a specific subset of universities.
     *      - integer count: Number of universities to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getUniversities(string $access_token, array $params = array()) {
        return $this->request->post('database.getUniversities', $access_token, $params);
    }

    /**
     * Returns a list of schools.
     * 
     * @param $access_token string
     * @param $params array
     *      - string q: Search query.
     *      - integer city_id: City ID.
     *      - integer offset: Offset needed to return a specific subset of schools.
     *      - integer count: Number of schools to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getSchools(string $access_token, array $params = array()) {
        return $this->request->post('database.getSchools', $access_token, $params);
    }

    /**
     * Returns a list of school classes specified for the country.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer country_id: Country ID.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getSchoolClasses(string $access_token, array $params = array()) {
        return $this->request->post('database.getSchoolClasses', $access_token, $params);
    }

    /**
     * Returns a list of faculties (i.e., university departments).
     * 
     * @param $access_token string
     * @param $params array
     *      - integer university_id: University ID.
     *      - integer offset: Offset needed to return a specific subset of faculties.
     *      - integer count: Number of faculties to return.
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getFaculties(string $access_token, array $params = array()) {
        return $this->request->post('database.getFaculties', $access_token, $params);
    }

    /**
     * Returns list of chairs on a specified faculty.
     * 
     * @param $access_token string
     * @param $params array
     *      - integer faculty_id: id of the faculty to get chairs from
     *      - integer offset: offset required to get a certain subset of chairs
     *      - integer count: amount of chairs to get
     * 
     * @return mixed
     * @throws VKClientException in case of error on the Api side
     * @throws VKApiException in case of network error
     * 
     **/
    public function getChairs(string $access_token, array $params = array()) {
        return $this->request->post('database.getChairs', $access_token, $params);
    }
}
