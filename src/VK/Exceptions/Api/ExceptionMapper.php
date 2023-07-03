<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class ExceptionMapper
{
	/**
	 * @param VkApiError $error
	 * @return VKApiException
	 */
	public static function parse(VKApiError $error)
	{
		switch ($error->getErrorCode()) {
			case 1:
				return new VKApiUnknownException($error);
			case 2:
				return new VKApiDisabledException($error);
			case 3:
				return new VKApiMethodException($error);
			case 4:
				return new VKApiSignatureException($error);
			case 5:
				return new VKApiAuthException($error);
			case 6:
				return new VKApiTooManyException($error);
			case 7:
				return new VKApiPermissionException($error);
			case 8:
				return new VKApiRequestException($error);
			case 9:
				return new VKApiFloodException($error);
			case 10:
				return new VKApiServerException($error);
			case 11:
				return new VKApiEnabledInTestException($error);
			case 12:
				return new VKApiCompileException($error);
			case 13:
				return new VKApiRuntimeException($error);
			case 14:
				return new VKApiCaptchaException($error);
			case 15:
				return new VKApiAccessException($error);
			case 16:
				return new VKApiAuthHttpsException($error);
			case 17:
				return new VKApiAuthValidationException($error);
			case 18:
				return new VKApiUserDeletedException($error);
			case 19:
				return new VKApiBlockedException($error);
			case 20:
				return new VKApiMethodPermissionException($error);
			case 21:
				return new VKApiMethodAdsException($error);
			case 22:
				return new VKApiUploadException($error);
			case 23:
				return new VKApiMethodDisabledException($error);
			case 24:
				return new VKApiNeedConfirmationException($error);
			case 25:
				return new VKApiNeedTokenConfirmationException($error);
			case 27:
				return new VKApiGroupAuthException($error);
			case 28:
				return new VKApiAppAuthException($error);
			case 29:
				return new VKApiRateLimitException($error);
			case 30:
				return new VKApiPrivateProfileException($error);
			case 32:
				return new VKApiWaitException($error);
			case 33:
				return new VKApiNotImplementedYetException($error);
			case 34:
				return new VKApiClientVersionDeprecatedException($error);
			case 35:
				return new VKApiClientUpdateNeededException($error);
			case 36:
				return new VKApiTimeoutException($error);
			case 37:
				return new VKApiUserBannedException($error);
			case 38:
				return new VKApiUnknownApplicationException($error);
			case 39:
				return new VKApiUnknownUserException($error);
			case 40:
				return new VKApiUnknownGroupException($error);
			case 41:
				return new VKApiAdditionalSignupRequiredException($error);
			case 42:
				return new VKApiIpIsNotAllowedException($error);
			case 43:
				return new VKApiSectionDisabledException($error);
			case 100:
				return new VKApiParamException($error);
			case 101:
				return new VKApiParamApiIdException($error);
			case 103:
				return new VKApiLimitsException($error);
			case 104:
				return new VKApiNotFoundException($error);
			case 105:
				return new VKApiSaveFileException($error);
			case 106:
				return new VKApiActionFailedException($error);
			case 113:
				return new VKApiParamUserIdException($error);
			case 114:
				return new VKApiParamAlbumIdException($error);
			case 118:
				return new VKApiParamServerException($error);
			case 119:
				return new VKApiParamTitleException($error);
			case 121:
				return new VKApiParamHashException($error);
			case 122:
				return new VKApiParamPhotosException($error);
			case 125:
				return new VKApiParamGroupIdException($error);
			case 129:
				return new VKApiParamPhotoException($error);
			case 140:
				return new VKApiParamPageIdException($error);
			case 141:
				return new VKApiAccessPageException($error);
			case 146:
				return new VKApiMobileNotActivatedException($error);
			case 147:
				return new VKApiInsufficientFundsException($error);
			case 150:
				return new VKApiParamTimestampException($error);
			case 171:
				return new VKApiFriendsListIdException($error);
			case 173:
				return new VKApiFriendsListLimitException($error);
			case 174:
				return new VKApiFriendsAddYourselfException($error);
			case 175:
				return new VKApiFriendsAddInEnemyException($error);
			case 176:
				return new VKApiFriendsAddEnemyException($error);
			case 177:
				return new VKApiFriendsAddNotFoundException($error);
			case 180:
				return new VKApiParamNoteIdException($error);
			case 181:
				return new VKApiAccessNoteException($error);
			case 182:
				return new VKApiAccessNoteCommentException($error);
			case 183:
				return new VKApiAccessCommentException($error);
			case 200:
				return new VKApiAccessAlbumException($error);
			case 201:
				return new VKApiAccessAudioException($error);
			case 203:
				return new VKApiAccessGroupException($error);
			case 204:
				return new VKApiAccessVideoException($error);
			case 205:
				return new VKApiAccessMarketException($error);
			case 210:
				return new VKApiWallAccessPostException($error);
			case 211:
				return new VKApiWallAccessCommentException($error);
			case 212:
				return new VKApiWallAccessRepliesException($error);
			case 213:
				return new VKApiWallAccessAddReplyException($error);
			case 214:
				return new VKApiWallAddPostException($error);
			case 219:
				return new VKApiWallAdsPublishedException($error);
			case 220:
				return new VKApiWallTooManyRecipientsException($error);
			case 221:
				return new VKApiStatusNoAudioException($error);
			case 222:
				return new VKApiWallLinksForbiddenException($error);
			case 223:
				return new VKApiWallReplyOwnerFloodException($error);
			case 224:
				return new VKApiWallAdsPostLimitReachedException($error);
			case 225:
				return new VKApiWallDonutException($error);
			case 232:
				return new VKApiLikesReactionCanNotBeAppliedException($error);
			case 250:
				return new VKApiPollsAccessException($error);
			case 251:
				return new VKApiPollsPollIdException($error);
			case 252:
				return new VKApiPollsAnswerIdException($error);
			case 253:
				return new VKApiPollsAccessWithoutVoteException($error);
			case 260:
				return new VKApiAccessGroupsException($error);
			case 300:
				return new VKApiAlbumFullException($error);
			case 302:
				return new VKApiAlbumsLimitException($error);
			case 500:
				return new VKApiVotesPermissionException($error);
			case 600:
				return new VKApiAdsPermissionException($error);
			case 601:
				return new VKApiWeightedFloodException($error);
			case 602:
				return new VKApiAdsPartialSuccessException($error);
			case 603:
				return new VKApiAdsSpecificException($error);
			case 629:
				return new VKApiAdsObjectDeletedException($error);
			case 630:
				return new VKApiAdsLookalikeRequestAlreadyInProgressException($error);
			case 631:
				return new VKApiAdsLookalikeRequestMaxCountPerDayReachedException($error);
			case 632:
				return new VKApiAdsLookalikeRequestAudienceTooSmallException($error);
			case 633:
				return new VKApiAdsLookalikeRequestAudienceTooLargeException($error);
			case 634:
				return new VKApiAdsLookalikeRequestExportAlreadyInProgressException($error);
			case 635:
				return new VKApiAdsLookalikeRequestExportMaxCountPerDayReachedException($error);
			case 636:
				return new VKApiAdsLookalikeRequestExportRetargetingGroupLimitException($error);
			case 700:
				return new VKApiGroupChangeCreatorException($error);
			case 701:
				return new VKApiGroupNotInClubException($error);
			case 702:
				return new VKApiGroupTooManyOfficersException($error);
			case 703:
				return new VKApiGroupNeed2faException($error);
			case 704:
				return new VKApiGroupHostNeed2faException($error);
			case 706:
				return new VKApiGroupTooManyAddressesException($error);
			case 711:
				return new VKApiGroupAppIsNotInstalledInCommunityException($error);
			case 714:
				return new VKApiGroupInviteLinksNotValidException($error);
			case 800:
				return new VKApiVideoAlreadyAddedException($error);
			case 801:
				return new VKApiVideoCommentsClosedException($error);
			case 900:
				return new VKApiMessagesUserBlockedException($error);
			case 901:
				return new VKApiMessagesDenySendException($error);
			case 902:
				return new VKApiMessagesPrivacyException($error);
			case 907:
				return new VKApiMessagesTooOldPtsException($error);
			case 908:
				return new VKApiMessagesTooNewPtsException($error);
			case 909:
				return new VKApiMessagesEditExpiredException($error);
			case 910:
				return new VKApiMessagesTooBigException($error);
			case 911:
				return new VKApiMessagesKeyboardInvalidException($error);
			case 912:
				return new VKApiMessagesChatBotFeatureException($error);
			case 913:
				return new VKApiMessagesTooLongForwardsException($error);
			case 914:
				return new VKApiMessagesTooLongMessageException($error);
			case 917:
				return new VKApiMessagesChatUserNoAccessException($error);
			case 919:
				return new VKApiMessagesCantSeeInviteLinkException($error);
			case 920:
				return new VKApiMessagesEditKindDisallowedException($error);
			case 921:
				return new VKApiMessagesCantFwdException($error);
			case 922:
				return new VKApiMessagesChatUserLeftException($error);
			case 924:
				return new VKApiMessagesCantDeleteForAllException($error);
			case 925:
				return new VKApiMessagesChatNotAdminException($error);
			case 927:
				return new VKApiMessagesChatNotExistException($error);
			case 931:
				return new VKApiMessagesCantChangeInviteLinkException($error);
			case 932:
				return new VKApiMessagesGroupPeerAccessException($error);
			case 935:
				return new VKApiMessagesChatUserNotInChatException($error);
			case 936:
				return new VKApiMessagesContactNotFoundException($error);
			case 939:
				return new VKApiMessagesMessageRequestAlreadySentException($error);
			case 940:
				return new VKApiMessagesTooManyPostsException($error);
			case 942:
				return new VKApiMessagesCantPinOneTimeStoryException($error);
			case 943:
				return new VKApiMessagesIntentCantUseException($error);
			case 944:
				return new VKApiMessagesIntentLimitOverflowException($error);
			case 945:
				return new VKApiMessagesChatDisabledException($error);
			case 946:
				return new VKApiMessagesChatUnsupportedException($error);
			case 947:
				return new VKApiMessagesMemberAccessToGroupDeniedException($error);
			case 949:
				return new VKApiMessagesCantEditPinnedYetException($error);
			case 950:
				return new VKApiMessagesPeerBlockedReasonByTimeException($error);
			case 962:
				return new VKApiMessagesUserNotDonException($error);
			case 969:
				return new VKApiMessagesMessageCannotBeForwardedException($error);
			case 970:
				return new VKApiMessagesCantPinExpiringMessageException($error);
			case 1105:
				return new VKApiAuthFloodException($error);
			case 1114:
				return new VKApiAuthAnonymousTokenHasExpiredException($error);
			case 1116:
				return new VKApiAuthAnonymousTokenIsInvalidException($error);
			case 1117:
				return new VKApiAuthAccessTokenHasExpiredException($error);
			case 1118:
				return new VKApiAuthAnonymousTokenIpMismatchException($error);
			case 1150:
				return new VKApiParamDocIdException($error);
			case 1151:
				return new VKApiParamDocDeleteAccessException($error);
			case 1152:
				return new VKApiParamDocTitleException($error);
			case 1153:
				return new VKApiParamDocAccessException($error);
			case 1160:
				return new VKApiPhotoChangedException($error);
			case 1170:
				return new VKApiTooManyListsException($error);
			case 1251:
				return new VKApiAppsAlreadyUnlockedException($error);
			case 1256:
				return new VKApiAppsSubscriptionNotFoundException($error);
			case 1257:
				return new VKApiAppsSubscriptionInvalidStatusException($error);
			case 1260:
				return new VKApiInvalidAddressException($error);
			case 1400:
				return new VKApiMarketRestoreTooLateException($error);
			case 1401:
				return new VKApiMarketCommentsClosedException($error);
			case 1402:
				return new VKApiMarketAlbumNotFoundException($error);
			case 1403:
				return new VKApiMarketItemNotFoundException($error);
			case 1404:
				return new VKApiMarketItemAlreadyAddedException($error);
			case 1405:
				return new VKApiMarketTooManyItemsException($error);
			case 1406:
				return new VKApiMarketTooManyItemsInAlbumException($error);
			case 1407:
				return new VKApiMarketTooManyAlbumsException($error);
			case 1408:
				return new VKApiMarketItemHasBadLinksException($error);
			case 1409:
				return new VKApiMarketExtendedNotEnabledException($error);
			case 1412:
				return new VKApiMarketGroupingItemsWithDifferentPropertiesException($error);
			case 1413:
				return new VKApiMarketGroupingAlreadyHasSuchVariantException($error);
			case 1416:
				return new VKApiMarketVariantNotFoundException($error);
			case 1417:
				return new VKApiMarketPropertyNotFoundException($error);
			case 1425:
				return new VKApiMarketGroupingMustContainMoreThanOneItemException($error);
			case 1426:
				return new VKApiMarketGroupingItemsMustHaveDistinctPropertiesException($error);
			case 1427:
				return new VKApiMarketOrdersNoCartItemsException($error);
			case 1429:
				return new VKApiMarketInvalidDimensionsException($error);
			case 1430:
				return new VKApiMarketCantChangeVkpayStatusException($error);
			case 1431:
				return new VKApiMarketShopAlreadyEnabledException($error);
			case 1432:
				return new VKApiMarketShopAlreadyDisabledException($error);
			case 1433:
				return new VKApiMarketPhotosCropInvalidFormatException($error);
			case 1434:
				return new VKApiMarketPhotosCropOverflowException($error);
			case 1435:
				return new VKApiMarketPhotosCropSizeTooLowException($error);
			case 1438:
				return new VKApiMarketNotEnabledException($error);
			case 1446:
				return new VKApiMarketAlbumMainHiddenException($error);
			case 1456:
				return new VKApiMarketOrdersInvalidStatusException($error);
			case 1600:
				return new VKApiStoryExpiredException($error);
			case 1602:
				return new VKApiStoryIncorrectReplyPrivacyException($error);
			case 1900:
				return new VKApiPrettyCardsCardNotFoundException($error);
			case 1901:
				return new VKApiPrettyCardsTooManyCardsException($error);
			case 1902:
				return new VKApiPrettyCardsCardIsConnectedToPostException($error);
			case 2000:
				return new VKApiCallbackApiServersLimitException($error);
			case 2100:
				return new VKApiStickersNotPurchasedException($error);
			case 2101:
				return new VKApiStickersTooManyFavoritesException($error);
			case 2102:
				return new VKApiStickersNotFavoriteException($error);
			case 3102:
				return new VKApiWallCheckLinkCantDetermineSourceException($error);
			case 3300:
				return new VKApiRecaptchaException($error);
			case 3301:
				return new VKApiPhoneValidationNeedException($error);
			case 3302:
				return new VKApiPasswordValidationNeedException($error);
			case 3303:
				return new VKApiOtpValidationNeedException($error);
			case 3304:
				return new VKApiEmailConfirmationNeedException($error);
			case 3305:
				return new VKApiAssertVotesException($error);
			case 3609:
				return new VKApiTokenExtensionRequiredException($error);
			case 3610:
				return new VKApiUserDeactivatedException($error);
			case 3611:
				return new VKApiUserServiceDeactivatedException($error);
			case 3800:
				return new VKApiFaveAliexpressTagException($error);
			case 7701:
				return new VKApiAsrAudioDurationFloodedException($error);
			case 7702:
				return new VKApiAsrFileIsTooBigException($error);
			case 7703:
				return new VKApiAsrInvalidHashException($error);
			case 7704:
				return new VKApiAsrNotFoundException($error);
			case 9999:
				return new VKApiNotSupportedHttpMethodException($error);
			default:
				return new VKApiException($error->getErrorCode(), $error->getErrorMsg(), $error);}
	}
}

