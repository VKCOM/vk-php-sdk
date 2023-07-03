<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\GroupsAct;
use VK\Enums\GroupsFilter;
use VK\Enums\GroupsNameCase;
use VK\Enums\GroupsSort;
use VK\Enums\GroupsSubtype;
use VK\Enums\GroupsTagColor;
use VK\Enums\GroupsType;
use VK\Enums\Groups\AddressWorkInfoStatus;
use VK\Enums\Groups\GroupAccess;
use VK\Enums\Groups\GroupAgeLimits;
use VK\Enums\Groups\GroupAudio;
use VK\Enums\Groups\GroupDocs;
use VK\Enums\Groups\GroupMarketCurrency;
use VK\Enums\Groups\GroupPhotos;
use VK\Enums\Groups\GroupRole;
use VK\Enums\Groups\GroupSubject;
use VK\Enums\Groups\GroupTopics;
use VK\Enums\Groups\GroupVideo;
use VK\Enums\Groups\GroupWall;
use VK\Enums\Groups\GroupWiki;
use VK\Enums\Groups\MarketState;
use VK\Exceptions\Api\VKApiAccessGroupsException;
use VK\Exceptions\Api\VKApiCallbackApiServersLimitException;
use VK\Exceptions\Api\VKApiClientUpdateNeededException;
use VK\Exceptions\Api\VKApiGroupChangeCreatorException;
use VK\Exceptions\Api\VKApiGroupHostNeed2faException;
use VK\Exceptions\Api\VKApiGroupInviteLinksNotValidException;
use VK\Exceptions\Api\VKApiGroupNeed2faException;
use VK\Exceptions\Api\VKApiGroupNotInClubException;
use VK\Exceptions\Api\VKApiGroupTooManyAddressesException;
use VK\Exceptions\Api\VKApiGroupTooManyOfficersException;
use VK\Exceptions\Api\VKApiInvalidAddressException;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\Api\VKApiMarketShopAlreadyDisabledException;
use VK\Exceptions\Api\VKApiMarketShopAlreadyEnabledException;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\Api\VKApiParamGroupIdException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Groups implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Groups constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var string title
	 * - @var string address
	 * - @var string additional_address
	 * - @var integer city_id
	 * - @var integer metro_id
	 * - @var number latitude
	 * - @var number longitude
	 * - @var string phone
	 * - @var AddressWorkInfoStatus work_info_status: Status of information about timetable
	 * - @var string timetable
	 * - @var boolean is_main_address
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessGroupsException Access to the groups list is denied due to the user's privacy settings
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiGroupTooManyAddressesException Too many addresses in club
	 */
	public function addAddress(string $access_token, array $params = [])
	{
		return $this->request->post('groups.addAddress', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var string url
	 * - @var string title
	 * - @var string secret_key
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiCallbackApiServersLimitException Servers number limit is reached
	 */
	public function addCallbackServer(string $access_token, array $params = [])
	{
		return $this->request->post('groups.addCallbackServer', $access_token, $params);
	}


	/**
	 * Allows to add a link to the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var string link: Link URL.
	 * - @var string text: Description text for the link.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function addLink(string $access_token, array $params = [])
	{
		return $this->request->post('groups.addLink', $access_token, $params);
	}


	/**
	 * Allows to approve join request to the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer user_id: User ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 */
	public function approveRequest(string $access_token, array $params = [])
	{
		return $this->request->post('groups.approveRequest', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer owner_id
	 * - @var integer end_date
	 * - @var integer reason
	 * - @var string comment
	 * - @var boolean comment_visible
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function ban(string $access_token, array $params = [])
	{
		return $this->request->post('groups.ban', $access_token, $params);
	}


	/**
	 * Creates a new community.
	 * @param string $access_token
	 * @param array $params
	 * - @var string title: Community title.
	 * - @var string description: Community description (ignored for 'type' = 'public').
	 * - @var GroupsType type: Community type. Possible values: *'group' - group,, *'event' - event,, *'public' - public page
	 * - @var integer public_category: Category ID (for 'type' = 'public' only).
	 * - @var integer public_subcategory: Public page subcategory ID.
	 * - @var GroupsSubtype subtype: Public page subtype. Possible values: *'1' - place or small business,, *'2' - company, organization or website,, *'3' - famous person or group of people,, *'4' - product or work of art.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 */
	public function create(string $access_token, array $params = [])
	{
		return $this->request->post('groups.create', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer address_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessGroupsException Access to the groups list is denied due to the user's privacy settings
	 * @throws VKApiNotFoundException Not found
	 */
	public function deleteAddress(string $access_token, array $params = [])
	{
		return $this->request->post('groups.deleteAddress', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer server_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function deleteCallbackServer(string $access_token, array $params = [])
	{
		return $this->request->post('groups.deleteCallbackServer', $access_token, $params);
	}


	/**
	 * Allows to delete a link from the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer link_id: Link ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function deleteLink(string $access_token, array $params = [])
	{
		return $this->request->post('groups.deleteLink', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function disableOnline(string $access_token, array $params = [])
	{
		return $this->request->post('groups.disableOnline', $access_token, $params);
	}


	/**
	 * Edits a community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var string title: Community title.
	 * - @var string description: Community description.
	 * - @var string screen_name: Community screen name.
	 * - @var GroupAccess access: Community type. Possible values: *'0' - open,, *'1' - closed,, *'2' - private.
	 * - @var string website: Website that will be displayed in the community information field.
	 * - @var GroupSubject subject: Community subject. Possible values: , *'1' - auto/moto,, *'2' - activity holidays,, *'3' - business,, *'4' - pets,, *'5' - health,, *'6' - dating and communication, , *'7' - games,, *'8' - IT (computers and software),, *'9' - cinema,, *'10' - beauty and fashion,, *'11' - cooking,, *'12' - art and culture,, *'13' - literature,, *'14' - mobile services and internet,, *'15' - music,, *'16' - science and technology,, *'17' - real estate,, *'18' - news and media,, *'19' - security,, *'20' - education,, *'21' - home and renovations,, *'22' - politics,, *'23' - food,, *'24' - industry,, *'25' - travel,, *'26' - work,, *'27' - entertainment,, *'28' - religion,, *'29' - family,, *'30' - sports,, *'31' - insurance,, *'32' - television,, *'33' - goods and services,, *'34' - hobbies,, *'35' - finance,, *'36' - photo,, *'37' - esoterics,, *'38' - electronics and appliances,, *'39' - erotic,, *'40' - humor,, *'41' - society, humanities,, *'42' - design and graphics.
	 * - @var string email: Organizer email (for events).
	 * - @var string phone: Organizer phone number (for events).
	 * - @var string rss: RSS feed address for import (available only to communities with special permission. Contact vk.com/support to get it.
	 * - @var integer event_start_date: Event start date in Unixtime format.
	 * - @var integer event_finish_date: Event finish date in Unixtime format.
	 * - @var integer event_group_id: Organizer community ID (for events only).
	 * - @var integer public_category: Public page category ID.
	 * - @var integer public_subcategory: Public page subcategory ID.
	 * - @var string public_date: Founding date of a company or organization owning the community in "dd.mm.YYYY" format.
	 * - @var GroupWall wall: Wall settings. Possible values: *'0' - disabled,, *'1' - open,, *'2' - limited (groups and events only),, *'3' - closed (groups and events only).
	 * - @var GroupTopics topics: Board topics settings. Possbile values: , *'0' - disabled,, *'1' - open,, *'2' - limited (for groups and events only).
	 * - @var GroupPhotos photos: Photos settings. Possible values: *'0' - disabled,, *'1' - open,, *'2' - limited (for groups and events only).
	 * - @var GroupVideo video: Video settings. Possible values: *'0' - disabled,, *'1' - open,, *'2' - limited (for groups and events only).
	 * - @var GroupAudio audio: Audio settings. Possible values: *'0' - disabled,, *'1' - open,, *'2' - limited (for groups and events only).
	 * - @var boolean links: Links settings (for public pages only). Possible values: *'0' - disabled,, *'1' - enabled.
	 * - @var boolean events: Events settings (for public pages only). Possible values: *'0' - disabled,, *'1' - enabled.
	 * - @var boolean places: Places settings (for public pages only). Possible values: *'0' - disabled,, *'1' - enabled.
	 * - @var boolean contacts: Contacts settings (for public pages only). Possible values: *'0' - disabled,, *'1' - enabled.
	 * - @var GroupDocs docs: Documents settings. Possible values: *'0' - disabled,, *'1' - open,, *'2' - limited (for groups and events only).
	 * - @var GroupWiki wiki: Wiki pages settings. Possible values: *'0' - disabled,, *'1' - open,, *'2' - limited (for groups and events only).
	 * - @var boolean messages: Community messages. Possible values: *'0' - disabled,, *'1' - enabled.
	 * - @var boolean articles
	 * - @var boolean addresses
	 * - @var GroupAgeLimits age_limits: Community age limits. Possible values: *'1' - no limits,, *'2' - 16+,, *'3' - 18+.
	 * - @var boolean market: Market settings. Possible values: *'0' - disabled,, *'1' - enabled.
	 * - @var boolean market_comments: market comments settings. Possible values: *'0' - disabled,, *'1' - enabled.
	 * - @var array[integer] market_country: Market delivery countries.
	 * - @var array[integer] market_city: Market delivery cities (if only one country is specified).
	 * - @var GroupMarketCurrency market_currency: Market currency settings. Possbile values: , *'643' - Russian rubles,, *'980' - Ukrainian hryvnia,, *'398' - Kazakh tenge,, *'978' - Euro,, *'840' - US dollars
	 * - @var integer market_contact: Seller contact for market. Set '0' for community messages.
	 * - @var integer market_wiki: ID of a wiki page with market description.
	 * - @var boolean obscene_filter: Obscene expressions filter in comments. Possible values: , *'0' - disabled,, *'1' - enabled.
	 * - @var boolean obscene_stopwords: Stopwords filter in comments. Possible values: , *'0' - disabled,, *'1' - enabled.
	 * - @var array[string] obscene_words: Keywords for stopwords filter.
	 * - @var integer main_section
	 * - @var integer secondary_section
	 * - @var integer country: Country of the community.
	 * - @var integer city: City of the community.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiInvalidAddressException Invalid screen name
	 */
	public function edit(string $access_token, array $params = [])
	{
		return $this->request->post('groups.edit', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer address_id
	 * - @var string title
	 * - @var string address
	 * - @var string additional_address
	 * - @var integer city_id
	 * - @var integer metro_id
	 * - @var number latitude
	 * - @var number longitude
	 * - @var string phone
	 * - @var AddressWorkInfoStatus work_info_status: Status of information about timetable
	 * - @var string timetable
	 * - @var boolean is_main_address
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessGroupsException Access to the groups list is denied due to the user's privacy settings
	 * @throws VKApiNotFoundException Not found
	 * @throws VKApiGroupTooManyAddressesException Too many addresses in club
	 */
	public function editAddress(string $access_token, array $params = [])
	{
		return $this->request->post('groups.editAddress', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer server_id
	 * - @var string url
	 * - @var string title
	 * - @var string secret_key
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function editCallbackServer(string $access_token, array $params = [])
	{
		return $this->request->post('groups.editCallbackServer', $access_token, $params);
	}


	/**
	 * Allows to edit a link in the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer link_id: Link ID.
	 * - @var string text: New description text for the link.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function editLink(string $access_token, array $params = [])
	{
		return $this->request->post('groups.editLink', $access_token, $params);
	}


	/**
	 * Allows to add, remove or edit the community manager.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer user_id: User ID.
	 * - @var GroupRole role: Manager role. Possible values: *'moderator',, *'editor',, *'administrator',, *'advertiser'.
	 * - @var boolean is_call_operator: '1' — allow the manager to accept community calls.
	 * - @var boolean is_contact: '1' - to show the manager in Contacts block of the community.
	 * - @var string contact_position: Position to show in Contacts block.
	 * - @var string contact_phone: Contact phone.
	 * - @var string contact_email: Contact e-mail.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiGroupChangeCreatorException Cannot edit creator role
	 * @throws VKApiGroupNotInClubException User should be in club
	 * @throws VKApiGroupTooManyOfficersException Too many officers in club
	 * @throws VKApiGroupNeed2faException You need to enable 2FA for this action
	 * @throws VKApiGroupHostNeed2faException User needs to enable 2FA for this action
	 */
	public function editManager(string $access_token, array $params = [])
	{
		return $this->request->post('groups.editManager', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function enableOnline(string $access_token, array $params = [])
	{
		return $this->request->post('groups.enableOnline', $access_token, $params);
	}


	/**
	 * Returns a list of the communities to which a user belongs.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer user_id: User ID.
	 * - @var boolean extended: '1' - to return complete information about a user's communities, '0' - to return a list of community IDs without any additional fields (default),
	 * - @var array[GroupsFilter] filter: Types of communities to return: 'admin' - to return communities administered by the user , 'editor' - to return communities where the user is an administrator or editor, 'moder' - to return communities where the user is an administrator, editor, or moderator, 'groups' - to return only groups, 'publics' - to return only public pages, 'events' - to return only events
	 * - @var array[GroupsFields] fields: Profile fields to return.
	 * - @var integer offset: Offset needed to return a specific subset of communities.
	 * - @var integer count: Number of communities to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAccessGroupsException Access to the groups list is denied due to the user's privacy settings
	 */
	public function get(string $access_token, array $params = [])
	{
		return $this->request->post('groups.get', $access_token, $params);
	}


	/**
	 * Returns a list of community addresses.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: ID or screen name of the community.
	 * - @var array[integer] address_ids
	 * - @var number latitude: Latitude of  the user geo position.
	 * - @var number longitude: Longitude of the user geo position.
	 * - @var integer offset: Offset needed to return a specific subset of community addresses.
	 * - @var integer count: Number of community addresses to return.
	 * - @var array[GroupsFields] fields: Address fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamGroupIdException Invalid group id
	 * @throws VKApiAccessGroupsException Access to the groups list is denied due to the user's privacy settings
	 */
	public function getAddresses(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getAddresses', $access_token, $params);
	}


	/**
	 * Returns a list of users on a community blacklist.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer offset: Offset needed to return a specific subset of users.
	 * - @var integer count: Number of users to return.
	 * - @var array[GroupsFields] fields
	 * - @var integer owner_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function getBanned(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getBanned', $access_token, $params);
	}


	/**
	 * Returns information about communities by their IDs.
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer]|array[string] group_ids: IDs or screen names of communities.
	 * - @var integer|string group_id: ID or screen name of the community.
	 * - @var array[GroupsFields] fields: Group fields to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getById(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getById', $access_token, $params);
	}


	/**
	 * Returns Callback API confirmation code for the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCallbackConfirmationCode(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getCallbackConfirmationCode', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var array[integer] server_ids
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCallbackServers(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getCallbackServers', $access_token, $params);
	}


	/**
	 * Returns [vk.com/dev/callback_api|Callback API] notifications settings.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer server_id: Server ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function getCallbackSettings(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getCallbackSettings', $access_token, $params);
	}


	/**
	 * Returns categories list for communities catalog
	 * @param string $access_token
	 * @param array $params
	 * - @var boolean extended: 1 - to return communities count and three communities for preview. By default: 0.
	 * - @var boolean subcategories: 1 - to return subcategories info. By default: 0.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCatalogInfo(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getCatalogInfo', $access_token, $params);
	}


	/**
	 * Returns invited users list of a community
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Group ID to return invited users for.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * - @var integer count: Number of results to return.
	 * - @var array[GroupsFields] fields: List of additional fields to be returned. Available values: 'sex, bdate, city, country, photo_50, photo_100, photo_200_orig, photo_200, photo_400_orig, photo_max, photo_max_orig, online, online_mobile, lists, domain, has_mobile, contacts, connections, site, education, universities, schools, can_post, can_see_all_posts, can_see_audio, can_write_private_message, status, last_seen, common_count, relation, relatives, counters'.
	 * - @var GroupsNameCase name_case: Case for declension of user name and surname. Possible values: *'nom' - nominative (default),, *'gen' - genitive,, *'dat' - dative,, *'acc' - accusative, , *'ins' - instrumental,, *'abl' - prepositional.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getInvitedUsers(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getInvitedUsers', $access_token, $params);
	}


	/**
	 * Returns a list of invitations to join communities and events.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer offset: Offset needed to return a specific subset of invitations.
	 * - @var integer count: Number of invitations to return.
	 * - @var boolean extended: '1' - to return additional [vk.com/dev/fields_groups|fields] for communities..
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getInvites(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getInvites', $access_token, $params);
	}


	/**
	 * Returns the data needed to query a Long Poll server for events
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getLongPollServer(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getLongPollServer', $access_token, $params);
	}


	/**
	 * Returns Long Poll notification settings
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getLongPollSettings(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getLongPollSettings', $access_token, $params);
	}


	/**
	 * Returns a list of community members.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer|string group_id: ID or screen name of the community.
	 * - @var GroupsSort sort: Sort order. Available values: 'id_asc', 'id_desc', 'time_asc', 'time_desc'. 'time_asc' and 'time_desc' are availavle only if the method is called by the group's 'moderator'.
	 * - @var integer offset: Offset needed to return a specific subset of community members.
	 * - @var integer count: Number of community members to return.
	 * - @var array[GroupsFields] fields: List of additional fields to be returned. Available values: 'sex, bdate, city, country, photo_50, photo_100, photo_200_orig, photo_200, photo_400_orig, photo_max, photo_max_orig, online, online_mobile, lists, domain, has_mobile, contacts, connections, site, education, universities, schools, can_post, can_see_all_posts, can_see_audio, can_write_private_message, status, last_seen, common_count, relation, relatives, counters'.
	 * - @var GroupsFilter filter: *'friends' - only friends in this community will be returned,, *'unsure' - only those who pressed 'I may attend' will be returned (if it's an event).
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiParamGroupIdException Invalid group id
	 */
	public function getMembers(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getMembers', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getOnlineStatus(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getOnlineStatus', $access_token, $params);
	}


	/**
	 * Returns a list of requests to the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * - @var integer count: Number of results to return.
	 * - @var array[GroupsFields] fields: Profile fields to return.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getRequests(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getRequests', $access_token, $params);
	}


	/**
	 * Returns community settings.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer|string group_id: Community ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSettings(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getSettings', $access_token, $params);
	}


	/**
	 * List of group's tags
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getTagList(string $access_token, array $params = [])
	{
		return $this->request->post('groups.getTagList', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getTokenPermissions(string $access_token)
	{
		return $this->request->post('groups.getTokenPermissions', $access_token);
	}


	/**
	 * Allows to invite friends to the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer user_id: User ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 */
	public function invite(string $access_token, array $params = [])
	{
		return $this->request->post('groups.invite', $access_token, $params);
	}


	/**
	 * Returns information specifying whether a user is a member of a community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer|string group_id: ID or screen name of the community.
	 * - @var integer user_id: User ID.
	 * - @var array[integer] user_ids: User IDs.
	 * - @var boolean extended: '1' - to return an extended response with additional fields. By default: '0'.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function isMember(string $access_token, array $params = [])
	{
		return $this->request->post('groups.isMember', $access_token, $params);
	}


	/**
	 * With this method you can join the group or public page, and also confirm your participation in an event.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: ID or screen name of the community.
	 * - @var string not_sure: Optional parameter which is taken into account when 'gid' belongs to the event: '1' - Perhaps I will attend, '0' - I will be there for sure (default), ,
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 * @throws VKApiGroupInviteLinksNotValidException Invite link is invalid - expired, deleted or not exists
	 */
	public function join(string $access_token, array $params = [])
	{
		return $this->request->post('groups.join', $access_token, $params);
	}


	/**
	 * With this method you can leave a group, public page, or event.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: ID or screen name of the community.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiClientUpdateNeededException Client update needed
	 */
	public function leave(string $access_token, array $params = [])
	{
		return $this->request->post('groups.leave', $access_token, $params);
	}


	/**
	 * Removes a user from the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer user_id: User ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function removeUser(string $access_token, array $params = [])
	{
		return $this->request->post('groups.removeUser', $access_token, $params);
	}


	/**
	 * Allows to reorder links in the community.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer link_id: Link ID.
	 * - @var integer after: ID of the link after which to place the link with 'link_id'.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function reorderLink(string $access_token, array $params = [])
	{
		return $this->request->post('groups.reorderLink', $access_token, $params);
	}


	/**
	 * Returns a list of communities matching the search criteria.
	 * @param string $access_token
	 * @param array $params
	 * - @var string q: Search query string.
	 * - @var GroupsType type: Community type. Possible values: 'group, page, event.'
	 * - @var integer country_id: Country ID.
	 * - @var integer city_id: City ID. If this parameter is transmitted, country_id is ignored.
	 * - @var boolean future: '1' - to return only upcoming events. Works with the 'type' = 'event' only.
	 * - @var boolean market: '1' - to return communities with enabled market only.
	 * - @var GroupsSort sort: Sort order. Possible values: *'0' - default sorting (similar the full version of the site),, *'1' - by growth speed,, *'2'- by the "day attendance/members number" ratio,, *'3' - by the "Likes number/members number" ratio,, *'4' - by the "comments number/members number" ratio,, *'5' - by the "boards entries number/members number" ratio.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * - @var integer count: Number of communities to return. "Note that you can not receive more than first thousand of results, regardless of 'count' and 'offset' values."
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function search(string $access_token, array $params = [])
	{
		return $this->request->post('groups.search', $access_token, $params);
	}


	/**
	 * Allow to set notifications settings for group.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var integer server_id: Server ID.
	 * - @var string api_version
	 * - @var boolean message_new: A new incoming message has been received ('0' - disabled, '1' - enabled).
	 * - @var boolean message_reply: A new outcoming message has been received ('0' - disabled, '1' - enabled).
	 * - @var boolean message_allow: Allowed messages notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean message_edit
	 * - @var boolean message_deny: Denied messages notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean message_typing_state
	 * - @var boolean photo_new: New photos notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean audio_new: New audios notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean video_new: New videos notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_new: New wall replies notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_edit: Wall replies edited notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_delete: A wall comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_restore: A wall comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_post_new: New wall posts notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_repost: New wall posts notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_new: New board posts notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_edit: Board posts edited notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_restore: Board posts restored notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_delete: Board posts deleted notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_new: New comment to photo notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_edit: A photo comment has been edited ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_delete: A photo comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_restore: A photo comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_new: New comment to video notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_edit: A video comment has been edited ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_delete: A video comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_restore: A video comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_new: New comment to market item notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_edit: A market comment has been edited ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_delete: A market comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_restore: A market comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean market_order_new
	 * - @var boolean market_order_edit
	 * - @var boolean poll_vote_new: A vote in a public poll has been added ('0' - disabled, '1' - enabled).
	 * - @var boolean group_join: Joined community notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean group_leave: Left community notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean group_change_settings
	 * - @var boolean group_change_photo
	 * - @var boolean group_officers_edit
	 * - @var boolean user_block: User added to community blacklist
	 * - @var boolean user_unblock: User removed from community blacklist
	 * - @var boolean lead_forms_new: New form in lead forms
	 * - @var boolean like_add
	 * - @var boolean like_remove
	 * - @var boolean message_event
	 * - @var boolean donut_subscription_create
	 * - @var boolean donut_subscription_prolonged
	 * - @var boolean donut_subscription_cancelled
	 * - @var boolean donut_subscription_price_changed
	 * - @var boolean donut_subscription_expired
	 * - @var boolean donut_money_withdraw
	 * - @var boolean donut_money_withdraw_error
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiNotFoundException Not found
	 */
	public function setCallbackSettings(string $access_token, array $params = [])
	{
		return $this->request->post('groups.setCallbackSettings', $access_token, $params);
	}


	/**
	 * Sets Long Poll notification settings
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id: Community ID.
	 * - @var boolean enabled: Sets whether Long Poll is enabled ('0' - disabled, '1' - enabled).
	 * - @var string api_version
	 * - @var boolean message_new: A new incoming message has been received ('0' - disabled, '1' - enabled).
	 * - @var boolean message_reply: A new outcoming message has been received ('0' - disabled, '1' - enabled).
	 * - @var boolean message_allow: Allowed messages notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean message_deny: Denied messages notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean message_edit: A message has been edited ('0' - disabled, '1' - enabled).
	 * - @var boolean message_typing_state
	 * - @var boolean photo_new: New photos notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean audio_new: New audios notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean video_new: New videos notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_new: New wall replies notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_edit: Wall replies edited notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_delete: A wall comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_reply_restore: A wall comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_post_new: New wall posts notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean wall_repost: New wall posts notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_new: New board posts notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_edit: Board posts edited notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_restore: Board posts restored notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean board_post_delete: Board posts deleted notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_new: New comment to photo notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_edit: A photo comment has been edited ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_delete: A photo comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean photo_comment_restore: A photo comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_new: New comment to video notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_edit: A video comment has been edited ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_delete: A video comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean video_comment_restore: A video comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_new: New comment to market item notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_edit: A market comment has been edited ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_delete: A market comment has been deleted ('0' - disabled, '1' - enabled).
	 * - @var boolean market_comment_restore: A market comment has been restored ('0' - disabled, '1' - enabled).
	 * - @var boolean poll_vote_new: A vote in a public poll has been added ('0' - disabled, '1' - enabled).
	 * - @var boolean group_join: Joined community notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean group_leave: Left community notifications ('0' - disabled, '1' - enabled).
	 * - @var boolean group_change_settings
	 * - @var boolean group_change_photo
	 * - @var boolean group_officers_edit
	 * - @var boolean user_block: User added to community blacklist
	 * - @var boolean user_unblock: User removed from community blacklist
	 * - @var boolean like_add
	 * - @var boolean like_remove
	 * - @var boolean message_event
	 * - @var boolean donut_subscription_create
	 * - @var boolean donut_subscription_prolonged
	 * - @var boolean donut_subscription_cancelled
	 * - @var boolean donut_subscription_price_changed
	 * - @var boolean donut_subscription_expired
	 * - @var boolean donut_money_withdraw
	 * - @var boolean donut_money_withdraw_error
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function setLongPollSettings(string $access_token, array $params = [])
	{
		return $this->request->post('groups.setLongPollSettings', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var boolean messages
	 * - @var boolean bots_capabilities: By enabling bot abilities, you can send users messages with a customized keyboard attached as well as use other promotional abilities
	 * - @var boolean bots_start_button: If this setting is enabled, users will see a Start button when they start a chat with your community for the first time
	 * - @var boolean bots_add_to_chat: If this setting is enabled then users can add your community to a chat
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function setSettings(string $access_token, array $params = [])
	{
		return $this->request->post('groups.setSettings', $access_token, $params);
	}


	/**
	 * In order to save note about group participant
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer user_id
	 * - @var string note: Note body
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function setUserNote(string $access_token, array $params = [])
	{
		return $this->request->post('groups.setUserNote', $access_token, $params);
	}


	/**
	 * Add new group's tag
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var string tag_name
	 * - @var GroupsTagColor tag_color
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function tagAdd(string $access_token, array $params = [])
	{
		return $this->request->post('groups.tagAdd', $access_token, $params);
	}


	/**
	 * Bind or unbind group's tag to user
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer tag_id
	 * - @var integer user_id
	 * - @var GroupsAct act: Describe the action
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function tagBind(string $access_token, array $params = [])
	{
		return $this->request->post('groups.tagBind', $access_token, $params);
	}


	/**
	 * Delete group's tag
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer tag_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function tagDelete(string $access_token, array $params = [])
	{
		return $this->request->post('groups.tagDelete', $access_token, $params);
	}


	/**
	 * Update group's tag
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer tag_id
	 * - @var string tag_name
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function tagUpdate(string $access_token, array $params = [])
	{
		return $this->request->post('groups.tagUpdate', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var MarketState state: Declares state if market is enabled in group.
	 * - @var string ref
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMarketShopAlreadyEnabledException Market was already enabled in this group
	 * @throws VKApiMarketShopAlreadyDisabledException Market was already disabled in this group
	 */
	public function toggleMarket(string $access_token, array $params = [])
	{
		return $this->request->post('groups.toggleMarket', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer group_id
	 * - @var integer owner_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function unban(string $access_token, array $params = [])
	{
		return $this->request->post('groups.unban', $access_token, $params);
	}
}

