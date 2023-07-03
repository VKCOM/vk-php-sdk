<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Database implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Database constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Returns list of chairs on a specified faculty.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer faculty_id: id of the faculty to get chairs from
	 * - @var integer offset: offset required to get a certain subset of chairs
	 * - @var integer count: amount of chairs to get
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getChairs(string $access_token, array $params = [])
	{
		return $this->request->post('database.getChairs', $access_token, $params);
	}


	/**
	 * Returns a list of cities.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer country_id: Country ID.
	 * - @var integer region_id: Region ID.
	 * - @var string q: Search query.
	 * - @var boolean need_all: '1' - to return all cities in the country, '0' - to return major cities in the country (default),
	 * - @var integer offset: Offset needed to return a specific subset of cities.
	 * - @var integer count: Number of cities to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCities(string $access_token, array $params = [])
	{
		return $this->request->post('database.getCities', $access_token, $params);
	}


	/**
	 * Returns information about cities by their IDs.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] city_ids: City IDs.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCitiesById(string $access_token, array $params = [])
	{
		return $this->request->post('database.getCitiesById', $access_token, $params);
	}


	/**
	 * Returns a list of countries.
	 * @param string $access_token
	 * @param array $params
	 * - @var boolean need_all: '1' - to return a full list of all countries, '0' - to return a list of countries near the current user's country (default).
	 * - @var string code: Country codes in [vk.com/dev/country_codes|ISO 3166-1 alpha-2] standard.
	 * - @var integer offset: Offset needed to return a specific subset of countries.
	 * - @var integer count: Number of countries to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCountries(string $access_token, array $params = [])
	{
		return $this->request->post('database.getCountries', $access_token, $params);
	}


	/**
	 * Returns information about countries by their IDs.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] country_ids: Country IDs.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCountriesById(string $access_token, array $params = [])
	{
		return $this->request->post('database.getCountriesById', $access_token, $params);
	}


	/**
	 * Returns a list of faculties (i.e., university departments).
	 * @param string $access_token
	 * @param array $params
	 * - @var integer university_id: University ID.
	 * - @var integer offset: Offset needed to return a specific subset of faculties.
	 * - @var integer count: Number of faculties to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getFaculties(string $access_token, array $params = [])
	{
		return $this->request->post('database.getFaculties', $access_token, $params);
	}


	/**
	 * Get metro stations by city
	 * @param string $access_token
	 * @param array $params
	 * - @var integer city_id
	 * - @var integer offset
	 * - @var integer count
	 * - @var boolean extended
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getMetroStations(string $access_token, array $params = [])
	{
		return $this->request->post('database.getMetroStations', $access_token, $params);
	}


	/**
	 * Get metro station by his id
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] station_ids
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getMetroStationsById(string $access_token, array $params = [])
	{
		return $this->request->post('database.getMetroStationsById', $access_token, $params);
	}


	/**
	 * Returns a list of regions.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer country_id: Country ID, received in [vk.com/dev/database.getCountries|database.getCountries] method.
	 * - @var string q: Search query.
	 * - @var integer offset: Offset needed to return specific subset of regions.
	 * - @var integer count: Number of regions to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getRegions(string $access_token, array $params = [])
	{
		return $this->request->post('database.getRegions', $access_token, $params);
	}


	/**
	 * Returns a list of school classes specified for the country.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer country_id: Country ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSchoolClasses(string $access_token, array $params = [])
	{
		return $this->request->post('database.getSchoolClasses', $access_token, $params);
	}


	/**
	 * Returns a list of schools.
	 * @param string $access_token
	 * @param array $params
	 * - @var string q: Search query.
	 * - @var integer city_id: City ID.
	 * - @var integer offset: Offset needed to return a specific subset of schools.
	 * - @var integer count: Number of schools to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSchools(string $access_token, array $params = [])
	{
		return $this->request->post('database.getSchools', $access_token, $params);
	}


	/**
	 * Returns a list of higher education institutions.
	 * @param string $access_token
	 * @param array $params
	 * - @var string q: Search query.
	 * - @var integer country_id: Country ID.
	 * - @var integer city_id: City ID.
	 * - @var integer offset: Offset needed to return a specific subset of universities.
	 * - @var integer count: Number of universities to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getUniversities(string $access_token, array $params = [])
	{
		return $this->request->post('database.getUniversities', $access_token, $params);
	}
}

