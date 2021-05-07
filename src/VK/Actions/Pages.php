<?php
namespace VK\Actions;

use VK\Actions\Enums\PagesEdit;
use VK\Actions\Enums\PagesView;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiAccessPageException;
use VK\Exceptions\Api\VKApiParamPageIdException;
use VK\Exceptions\Api\VKApiParamTitleException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Pages {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Pages constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Allows to clear the cache of particular 'external' pages which may be attached to VK posts.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string url: Address of the page where you need to refesh the cached version
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function clearCache($access_token, array $params = []) {
		return $this->request->post('pages.clearCache', $access_token, $params);
	}

	/**
	 * Returns information about a wiki page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer owner_id: Page owner ID.
	 * - @var integer page_id: Wiki page ID.
	 * - @var boolean global: '1' — to return information about a global wiki page
	 * - @var boolean site_preview: '1' — resulting wiki page is a preview for the attached link
	 * - @var string title: Wiki page title.
	 * - @var boolean need_source
	 * - @var boolean need_html: '1' — to return the page as HTML,
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function get($access_token, array $params = []) {
		return $this->request->post('pages.get', $access_token, $params);
	}

	/**
	 * Returns a list of all previous versions of a wiki page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer page_id: Wiki page ID.
	 * - @var integer group_id: ID of the community that owns the wiki page.
	 * - @var integer user_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessPageException Access to page denied
	 * @throws VKApiParamPageIdException Page not found
	 * @return mixed
	 */
	public function getHistory($access_token, array $params = []) {
		return $this->request->post('pages.getHistory', $access_token, $params);
	}

	/**
	 * Returns a list of wiki pages in a group.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: ID of the community that owns the wiki page.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessPageException Access to page denied
	 * @return mixed
	 */
	public function getTitles($access_token, array $params = []) {
		return $this->request->post('pages.getTitles', $access_token, $params);
	}

	/**
	 * Returns the text of one of the previous versions of a wiki page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer version_id
	 * - @var integer group_id: ID of the community that owns the wiki page.
	 * - @var integer user_id
	 * - @var boolean need_html: '1' — to return the page as HTML
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessPageException Access to page denied
	 * @return mixed
	 */
	public function getVersion($access_token, array $params = []) {
		return $this->request->post('pages.getVersion', $access_token, $params);
	}

	/**
	 * Returns HTML representation of the wiki markup.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string text: Text of the wiki page.
	 * - @var integer group_id: ID of the group in the context of which this markup is interpreted.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function parseWiki($access_token, array $params = []) {
		return $this->request->post('pages.parseWiki', $access_token, $params);
	}

	/**
	 * Saves the text of a wiki page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string text: Text of the wiki page in wiki-format.
	 * - @var integer page_id: Wiki page ID. The 'title' parameter can be passed instead of 'pid'.
	 * - @var integer group_id: ID of the community that owns the wiki page.
	 * - @var integer user_id: User ID
	 * - @var string title: Wiki page title.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessPageException Access to page denied
	 * @throws VKApiParamPageIdException Page not found
	 * @throws VKApiParamTitleException Invalid title
	 * @return mixed
	 */
	public function save($access_token, array $params = []) {
		return $this->request->post('pages.save', $access_token, $params);
	}

	/**
	 * Saves modified read and edit access settings for a wiki page.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer page_id: Wiki page ID.
	 * - @var integer group_id: ID of the community that owns the wiki page.
	 * - @var integer user_id
	 * - @var PagesView view: Who can view the wiki page: '1' — only community members, '2' — all users can view the page, '0' — only community managers
	 * - @var PagesEdit edit: Who can edit the wiki page: '1' — only community members, '2' — all users can edit the page, '0' — only community managers
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessPageException Access to page denied
	 * @throws VKApiParamPageIdException Page not found
	 * @return mixed
	 */
	public function saveAccess($access_token, array $params = []) {
		return $this->request->post('pages.saveAccess', $access_token, $params);
	}
}
