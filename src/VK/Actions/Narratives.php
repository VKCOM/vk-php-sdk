<?php
namespace VK\Actions;

use VK\Client\VKApiRequest;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Narratives {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Narratives constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Allows to delete narrative.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: Narrative owner's ID. Current user id is used by default.
	 * - @var integer narrative_id: Narrative ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function delete($access_token, array $params = []) {
		return $this->request->post('narratives.delete', $access_token, $params);
	}

	/**
	 * Returns narrative by ID.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[string] narratives: Narratives IDs separated by commas. Use format {owner_id}+'_'+{narrative_id}, for example, 12345_54331.
	 * - @var boolean extended: '1' — to return additional fields for users and communities. Default value is 0.
	 * - @var array[NarrativesFields] fields: Additional fields to return
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getById($access_token, array $params = []) {
		return $this->request->post('narratives.getById', $access_token, $params);
	}

	/**
	 * Returns narrative by owner ID.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: Narrative owner's ID. Current user id is used by default.
	 * - @var boolean extended: '1' — to return additional fields for users and communities. Default value is 0.
	 * - @var array[NarrativesFields] fields: Additional fields to return
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getFromOwner($access_token, array $params = []) {
		return $this->request->post('narratives.getFromOwner', $access_token, $params);
	}

	/**
	 * Returns recommendations by narrative ID.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: Narrative owner's ID. Current user id is used by default.
	 * - @var integer narrative_id: Narrative ID.
	 * - @var integer offset: Offset needed to return a specific subset of narratives.
	 * - @var boolean extended: '1' — to return additional fields for users and communities. Default value is 0.
	 * - @var array[NarrativesFields] fields: Additional fields to return
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getRecommendations($access_token, array $params = []) {
		return $this->request->post('narratives.getRecommendations', $access_token, $params);
	}
}
