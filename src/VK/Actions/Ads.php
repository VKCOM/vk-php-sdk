<?php

namespace VK\Actions;

use VK\Client\Actions\ActionInterface;
use VK\Client\VKApiRequest;
use VK\Enums\AdsAdFormat;
use VK\Enums\AdsIdsType;
use VK\Enums\AdsLinkType;
use VK\Enums\AdsPeriod;
use VK\Enums\AdsSection;
use VK\Enums\BaseLang;
use VK\Exceptions\Api\VKApiAdsLookalikeRequestAlreadyInProgressException;
use VK\Exceptions\Api\VKApiAdsLookalikeRequestAudienceTooLargeException;
use VK\Exceptions\Api\VKApiAdsLookalikeRequestAudienceTooSmallException;
use VK\Exceptions\Api\VKApiAdsLookalikeRequestExportAlreadyInProgressException;
use VK\Exceptions\Api\VKApiAdsLookalikeRequestExportMaxCountPerDayReachedException;
use VK\Exceptions\Api\VKApiAdsLookalikeRequestExportRetargetingGroupLimitException;
use VK\Exceptions\Api\VKApiAdsLookalikeRequestMaxCountPerDayReachedException;
use VK\Exceptions\Api\VKApiAdsObjectDeletedException;
use VK\Exceptions\Api\VKApiAdsPartialSuccessException;
use VK\Exceptions\Api\VKApiNotFoundException;
use VK\Exceptions\Api\VKApiWeightedFloodException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

class Ads implements ActionInterface
{
	/** @param VKApiRequest $request */
	private VKApiRequest $request;


	/**
	 * Ads constructor.
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request)
	{
		$this->request = $request;
	}


	/**
	 * Adds managers and/or supervisors to advertising account.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe added managers. Description of 'user_specification' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function addOfficeUsers(string $access_token, array $params = [])
	{
		return $this->request->post('ads.addOfficeUsers', $access_token, $params);
	}


	/**
	 * Allows to check the ad link.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var AdsLinkType link_type: Object type: *'community' - community,, *'post' - community post,, *'application' - VK application,, *'video' - video,, *'site' - external site.
	 * - @var string link_url: Object URL.
	 * - @var integer campaign_id: Campaign ID
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function checkLink(string $access_token, array $params = [])
	{
		return $this->request->post('ads.checkLink', $access_token, $params);
	}


	/**
	 * Creates ads.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe created ads. Description of 'ad_specification' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAdsPartialSuccessException Some part of the request has not been completed
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function createAds(string $access_token, array $params = [])
	{
		return $this->request->post('ads.createAds', $access_token, $params);
	}


	/**
	 * Creates advertising campaigns.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe created campaigns. Description of 'campaign_specification' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAdsPartialSuccessException Some part of the request has not been completed
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function createCampaigns(string $access_token, array $params = [])
	{
		return $this->request->post('ads.createCampaigns', $access_token, $params);
	}


	/**
	 * Creates clients of an advertising agency.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe created campaigns. Description of 'client_specification' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAdsPartialSuccessException Some part of the request has not been completed
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function createClients(string $access_token, array $params = [])
	{
		return $this->request->post('ads.createClients', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var string source_type
	 * - @var integer retargeting_group_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 * @throws VKApiAdsLookalikeRequestAlreadyInProgressException Lookalike request with same source already in progress
	 * @throws VKApiAdsLookalikeRequestMaxCountPerDayReachedException Max count of lookalike requests per day reached
	 * @throws VKApiAdsLookalikeRequestAudienceTooLargeException Given audience is too large
	 * @throws VKApiAdsLookalikeRequestAudienceTooSmallException Given audience is too small
	 */
	public function createLookalikeRequest(string $access_token, array $params = [])
	{
		return $this->request->post('ads.createLookalikeRequest', $access_token, $params);
	}


	/**
	 * Creates a group to re-target ads for users who visited advertiser's site (viewed information about the product, registered, etc.).
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id: 'Only for advertising agencies.', ID of the client with the advertising account where the group will be created.
	 * - @var string name: Name of the target group - a string up to 64 characters long.
	 * - @var integer lifetime: 'For groups with auditory created with pixel code only.', , Number of days after that users will be automatically removed from the group.
	 * - @var integer target_pixel_id
	 * - @var string target_pixel_rules
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function createTargetGroup(string $access_token, array $params = [])
	{
		return $this->request->post('ads.createTargetGroup', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var string name
	 * - @var string domain
	 * - @var integer category_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function createTargetPixel(string $access_token, array $params = [])
	{
		return $this->request->post('ads.createTargetPixel', $access_token, $params);
	}


	/**
	 * Archives ads.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string ids: Serialized JSON array with ad IDs.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAdsObjectDeletedException Object deleted
	 * @throws VKApiAdsPartialSuccessException Some part of the request has not been completed
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function deleteAds(string $access_token, array $params = [])
	{
		return $this->request->post('ads.deleteAds', $access_token, $params);
	}


	/**
	 * Archives advertising campaigns.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string ids: Serialized JSON array with IDs of deleted campaigns.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAdsObjectDeletedException Object deleted
	 * @throws VKApiAdsPartialSuccessException Some part of the request has not been completed
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function deleteCampaigns(string $access_token, array $params = [])
	{
		return $this->request->post('ads.deleteCampaigns', $access_token, $params);
	}


	/**
	 * Archives clients of an advertising agency.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string ids: Serialized JSON array with IDs of deleted clients.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAdsObjectDeletedException Object deleted
	 * @throws VKApiAdsPartialSuccessException Some part of the request has not been completed
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function deleteClients(string $access_token, array $params = [])
	{
		return $this->request->post('ads.deleteClients', $access_token, $params);
	}


	/**
	 * Deletes a retarget group.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id: 'Only for advertising agencies.' , ID of the client with the advertising account where the group will be created.
	 * - @var integer target_group_id: Group ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function deleteTargetGroup(string $access_token, array $params = [])
	{
		return $this->request->post('ads.deleteTargetGroup', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var integer target_pixel_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function deleteTargetPixel(string $access_token, array $params = [])
	{
		return $this->request->post('ads.deleteTargetPixel', $access_token, $params);
	}


	/**
	 * Returns a list of advertising accounts.
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getAccounts(string $access_token)
	{
		return $this->request->post('ads.getAccounts', $access_token);
	}


	/**
	 * Returns number of ads.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string ad_ids: Filter by ads. Serialized JSON array with ad IDs. If the parameter is null, all ads will be shown.
	 * - @var string campaign_ids: Filter by advertising campaigns. Serialized JSON array with campaign IDs. If the parameter is null, ads of all campaigns will be shown.
	 * - @var integer client_id: 'Available and required for advertising agencies.' ID of the client ads are retrieved from.
	 * - @var boolean include_deleted: Flag that specifies whether archived ads shall be shown: *0 - show only active ads,, *1 - show all ads.
	 * - @var boolean only_deleted: Flag that specifies whether to show only archived ads: *0 - show all ads,, *1 - show only archived ads. Available when include_deleted flag is *1
	 * - @var integer limit: Limit of number of returned ads. Used only if ad_ids parameter is null, and 'campaign_ids' parameter contains ID of only one campaign.
	 * - @var integer offset: Offset. Used in the same cases as 'limit' parameter.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getAds(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getAds', $access_token, $params);
	}


	/**
	 * Returns descriptions of ad layouts.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id: 'For advertising agencies.' ID of the client ads are retrieved from.
	 * - @var boolean include_deleted: Flag that specifies whether archived ads shall be shown. *0 - show only active ads,, *1 - show all ads.
	 * - @var boolean only_deleted: Flag that specifies whether to show only archived ads: *0 - show all ads,, *1 - show only archived ads. Available when include_deleted flag is *1
	 * - @var string campaign_ids: Filter by advertising campaigns. Serialized JSON array with campaign IDs. If the parameter is null, ads of all campaigns will be shown.
	 * - @var string ad_ids: Filter by ads. Serialized JSON array with ad IDs. If the parameter is null, all ads will be shown.
	 * - @var integer limit: Limit of number of returned ads. Used only if 'ad_ids' parameter is null, and 'campaign_ids' parameter contains ID of only one campaign.
	 * - @var integer offset: Offset. Used in the same cases as 'limit' parameter.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getAdsLayout(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getAdsLayout', $access_token, $params);
	}


	/**
	 * Returns ad targeting parameters.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string ad_ids: Filter by ads. Serialized JSON array with ad IDs. If the parameter is null, all ads will be shown.
	 * - @var string campaign_ids: Filter by advertising campaigns. Serialized JSON array with campaign IDs. If the parameter is null, ads of all campaigns will be shown.
	 * - @var integer client_id: 'For advertising agencies.' ID of the client ads are retrieved from.
	 * - @var boolean include_deleted: flag that specifies whether archived ads shall be shown: *0 - show only active ads,, *1 - show all ads.
	 * - @var integer limit: Limit of number of returned ads. Used only if 'ad_ids' parameter is null, and 'campaign_ids' parameter contains ID of only one campaign.
	 * - @var integer offset: Offset needed to return a specific subset of results.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getAdsTargeting(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getAdsTargeting', $access_token, $params);
	}


	/**
	 * Returns current budget of the advertising account.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getBudget(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getBudget', $access_token, $params);
	}


	/**
	 * Returns a list of campaigns in an advertising account.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id: 'For advertising agencies'. ID of the client advertising campaigns are retrieved from.
	 * - @var boolean include_deleted: Flag that specifies whether archived ads shall be shown. *0 - show only active campaigns,, *1 - show all campaigns.
	 * - @var string campaign_ids: Filter of advertising campaigns to show. Serialized JSON array with campaign IDs. Only campaigns that exist in 'campaign_ids' and belong to the specified advertising account will be shown. If the parameter is null, all campaigns will be shown.
	 * - @var array[AdsFields] fields
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getCampaigns(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getCampaigns', $access_token, $params);
	}


	/**
	 * Returns a list of possible ad categories.
	 * @param string $access_token
	 * @param array $params
	 * - @var string lang: Language. The full list of supported languages is [vk.com/dev/api_requests|here].
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getCategories(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getCategories', $access_token, $params);
	}


	/**
	 * Returns a list of advertising agency's clients.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getClients(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getClients', $access_token, $params);
	}


	/**
	 * Returns demographics for ads or campaigns.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var AdsIdsType ids_type: Type of requested objects listed in 'ids' parameter: *ad - ads,, *campaign - campaigns.
	 * - @var string ids: IDs requested ads or campaigns, separated with a comma, depending on the value set in 'ids_type'. Maximum 2000 objects.
	 * - @var AdsPeriod period: Data grouping by dates: *day - statistics by days,, *month - statistics by months,, *overall - overall statistics. 'date_from' and 'date_to' parameters set temporary limits.
	 * - @var string date_from: Date to show statistics from. For different value of 'period' different date format is used: *day: YYYY-MM-DD, example: 2011-09-27 - September 27, 2011, **0 - day it was created on,, *month: YYYY-MM, example: 2011-09 - September 2011, **0 - month it was created in,, *overall: 0.
	 * - @var string date_to: Date to show statistics to. For different value of 'period' different date format is used: *day: YYYY-MM-DD, example: 2011-09-27 - September 27, 2011, **0 - current day,, *month: YYYY-MM, example: 2011-09 - September 2011, **0 - current month,, *overall: 0.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getDemographics(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getDemographics', $access_token, $params);
	}


	/**
	 * Returns information about current state of a counter - number of remaining runs of methods and time to the next counter nulling in seconds.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getFloodStats(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getFloodStats', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var string requests_ids
	 * - @var integer offset
	 * - @var integer limit
	 * - @var string sort_by
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getLookalikeRequests(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getLookalikeRequests', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var string artist_name
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 * @throws VKApiNotFoundException Not found
	 */
	public function getMusicians(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getMusicians', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var array[integer] ids
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getMusiciansByIds(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getMusiciansByIds', $access_token, $params);
	}


	/**
	 * Returns a list of managers and supervisors of advertising account.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getOfficeUsers(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getOfficeUsers', $access_token, $params);
	}


	/**
	 * Returns detailed statistics of promoted posts reach from campaigns and ads.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var AdsIdsType ids_type: Type of requested objects listed in 'ids' parameter: *ad - ads,, *campaign - campaigns.
	 * - @var string ids: IDs requested ads or campaigns, separated with a comma, depending on the value set in 'ids_type'. Maximum 100 objects.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getPostsReach(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getPostsReach', $access_token, $params);
	}


	/**
	 * Returns a reason of ad rejection for pre-moderation.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer ad_id: Ad ID.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getRejectionReason(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getRejectionReason', $access_token, $params);
	}


	/**
	 * Returns statistics of performance indicators for ads, campaigns, clients or the whole account.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var AdsIdsType ids_type: Type of requested objects listed in 'ids' parameter: *ad - ads,, *campaign - campaigns,, *client - clients,, *office - account.
	 * - @var string ids: IDs requested ads, campaigns, clients or account, separated with a comma, depending on the value set in 'ids_type'. Maximum 2000 objects.
	 * - @var AdsPeriod period: Data grouping by dates: *day - statistics by days,, *month - statistics by months,, *overall - overall statistics. 'date_from' and 'date_to' parameters set temporary limits.
	 * - @var string date_from: Date to show statistics from. For different value of 'period' different date format is used: *day: YYYY-MM-DD, example: 2011-09-27 - September 27, 2011, **0 - day it was created on,, *month: YYYY-MM, example: 2011-09 - September 2011, **0 - month it was created in,, *overall: 0.
	 * - @var string date_to: Date to show statistics to. For different value of 'period' different date format is used: *day: YYYY-MM-DD, example: 2011-09-27 - September 27, 2011, **0 - current day,, *month: YYYY-MM, example: 2011-09 - September 2011, **0 - current month,, *overall: 0.
	 * - @var array[AdsStatsFields] stats_fields: Additional fields to add to statistics
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getStatistics(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getStatistics', $access_token, $params);
	}


	/**
	 * Returns a set of auto-suggestions for various targeting parameters.
	 * @param string $access_token
	 * @param array $params
	 * - @var AdsSection section: Section, suggestions are retrieved in. Available values: *countries - request of a list of countries. If q is not set or blank, a short list of countries is shown. Otherwise, a full list of countries is shown. *regions - requested list of regions. 'country' parameter is required. *cities - requested list of cities. 'country' parameter is required. *districts - requested list of districts. 'cities' parameter is required. *stations - requested list of subway stations. 'cities' parameter is required. *streets - requested list of streets. 'cities' parameter is required. *schools - requested list of educational organizations. 'cities' parameter is required. *interests - requested list of interests. *positions - requested list of positions (professions). *group_types - requested list of group types. *religions - requested list of religious commitments. *browsers - requested list of browsers and mobile devices.
	 * - @var string ids: Objects IDs separated by commas. If the parameter is passed, 'q, country, cities' should not be passed.
	 * - @var string q: Filter-line of the request (for countries, regions, cities, streets, schools, interests, positions).
	 * - @var integer country: ID of the country objects are searched in.
	 * - @var string cities: IDs of cities where objects are searched in, separated with a comma.
	 * - @var BaseLang lang: Language of the returned string values. Supported languages: *ru - Russian,, *ua - Ukrainian,, *en - English.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getSuggestions(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getSuggestions', $access_token, $params);
	}


	/**
	 * Returns a list of target groups.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id: 'Only for advertising agencies.', ID of the client with the advertising account where the group will be created.
	 * - @var boolean extended: '1' - to return pixel code.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getTargetGroups(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getTargetGroups', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getTargetPixels(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getTargetPixels', $access_token, $params);
	}


	/**
	 * Returns the size of targeting audience, and also recommended values for CPC and CPM.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id
	 * - @var string criteria: Serialized JSON object that describes targeting parameters. Description of 'criteria' object see below.
	 * - @var integer ad_id: ID of an ad which targeting parameters shall be analyzed.
	 * - @var AdsAdFormat ad_format: Ad format. Possible values: *'1' - image and text,, *'2' - big image,, *'3' - exclusive format,, *'4' - community, square image,, *'7' - special app format,, *'8' - special community format,, *'9' - post in community,, *'10' - app board.
	 * - @var string ad_platform: Platforms to use for ad showing. Possible values: (for 'ad_format' = '1'), *'0' - VK and partner sites,, *'1' - VK only. (for 'ad_format' = '9'), *'all' - all platforms,, *'desktop' - desktop version,, *'mobile' - mobile version and apps.
	 * - @var string ad_platform_no_wall
	 * - @var string ad_platform_no_ad_network
	 * - @var string publisher_platforms
	 * - @var string link_url: URL for the advertised object.
	 * - @var string link_domain: Domain of the advertised object.
	 * - @var boolean need_precise: Additionally return recommended cpc and cpm to reach 5,10..95 percents of audience.
	 * - @var integer impressions_limit_period: Impressions limit period in seconds, must be a multiple of 86400(day)
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function getTargetingStats(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getTargetingStats', $access_token, $params);
	}


	/**
	 * Returns URL to upload an ad photo to.
	 * @param string $access_token
	 * @param array $params
	 * - @var AdsAdFormat ad_format: Ad format: *1 - image and text,, *2 - big image,, *3 - exclusive format,, *4 - community, square image,, *7 - special app format.
	 * - @var integer icon
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getUploadURL(string $access_token, array $params = [])
	{
		return $this->request->post('ads.getUploadURL', $access_token, $params);
	}


	/**
	 * Returns URL to upload an ad video to.
	 * @param string $access_token
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 */
	public function getVideoUploadURL(string $access_token)
	{
		return $this->request->post('ads.getVideoUploadURL', $access_token);
	}


	/**
	 * Imports a list of advertiser's contacts to count VK registered users against the target group.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id: 'Only for advertising agencies.' , ID of the client with the advertising account where the group will be created.
	 * - @var integer target_group_id: Target group ID.
	 * - @var string contacts: List of phone numbers, emails or user IDs separated with a comma.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function importTargetContacts(string $access_token, array $params = [])
	{
		return $this->request->post('ads.importTargetContacts', $access_token, $params);
	}


	/**
	 * Removes managers and/or supervisors from advertising account.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string ids: Serialized JSON array with IDs of deleted managers.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function removeOfficeUsers(string $access_token, array $params = [])
	{
		return $this->request->post('ads.removeOfficeUsers', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var integer target_group_id
	 * - @var string contacts
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function removeTargetContacts(string $access_token, array $params = [])
	{
		return $this->request->post('ads.removeTargetContacts', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var integer request_id
	 * - @var integer level
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 * @throws VKApiAdsLookalikeRequestExportAlreadyInProgressException Lookalike request audience save already in progress
	 * @throws VKApiAdsLookalikeRequestExportMaxCountPerDayReachedException Max count of lookalike request audience saves per day reached
	 * @throws VKApiAdsLookalikeRequestExportRetargetingGroupLimitException Max count of retargeting groups reached
	 */
	public function saveLookalikeRequestResult(string $access_token, array $params = [])
	{
		return $this->request->post('ads.saveLookalikeRequestResult', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var integer target_group_id
	 * - @var integer share_with_client_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function shareTargetGroup(string $access_token, array $params = [])
	{
		return $this->request->post('ads.shareTargetGroup', $access_token, $params);
	}


	/**
	 * Edits ads.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe changes in ads. Description of 'ad_edit_specification' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function updateAds(string $access_token, array $params = [])
	{
		return $this->request->post('ads.updateAds', $access_token, $params);
	}


	/**
	 * Edits advertising campaigns.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe changes in campaigns. Description of 'campaign_mod' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiAdsPartialSuccessException Some part of the request has not been completed
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function updateCampaigns(string $access_token, array $params = [])
	{
		return $this->request->post('ads.updateCampaigns', $access_token, $params);
	}


	/**
	 * Edits clients of an advertising agency.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe changes in clients. Description of 'client_mod' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function updateClients(string $access_token, array $params = [])
	{
		return $this->request->post('ads.updateClients', $access_token, $params);
	}


	/**
	 * Adds managers and/or supervisors to advertising account.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var string data: Serialized JSON array of objects that describe added managers. Description of 'user_specification' objects see below.
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function updateOfficeUsers(string $access_token, array $params = [])
	{
		return $this->request->post('ads.updateOfficeUsers', $access_token, $params);
	}


	/**
	 * Edits a retarget group.
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id: Advertising account ID.
	 * - @var integer client_id: 'Only for advertising agencies.' , ID of the client with the advertising account where the group will be created.
	 * - @var integer target_group_id: Group ID.
	 * - @var string name: New name of the target group - a string up to 64 characters long.
	 * - @var string domain: Domain of the site where user accounting code will be placed.
	 * - @var integer lifetime: 'Only for the groups that get audience from sites with user accounting code.', Time in days when users added to a retarget group will be automatically excluded from it. '0' - automatic exclusion is off.
	 * - @var integer target_pixel_id
	 * - @var string target_pixel_rules
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function updateTargetGroup(string $access_token, array $params = [])
	{
		return $this->request->post('ads.updateTargetGroup', $access_token, $params);
	}


	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var integer account_id
	 * - @var integer client_id
	 * - @var integer target_pixel_id
	 * - @var string name
	 * - @var string domain
	 * - @var integer category_id
	 * @return mixed
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiWeightedFloodException Permission denied. You have requested too many actions this day. Try later.
	 */
	public function updateTargetPixel(string $access_token, array $params = [])
	{
		return $this->request->post('ads.updateTargetPixel', $access_token, $params);
	}
}

