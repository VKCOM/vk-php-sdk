<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class ExceptionMapper {

	/**
	 * @param VkApiError $error
	 */
	public static function parse(VkApiError $error) {
		switch ($error->getErrorCode()) {
		    case 1:
		        return new VKApiErrorUnknownException($error);
		    case 2:
		        return new VKApiErrorDisabledException($error);
		    case 3:
		        return new VKApiErrorMethodException($error);
		    case 4:
		        return new VKApiErrorSignatureException($error);
		    case 5:
		        return new VKApiErrorAuthException($error);
		    case 6:
		        return new VKApiErrorTooManyException($error);
		    case 7:
		        return new VKApiErrorPermissionException($error);
		    case 8:
		        return new VKApiErrorRequestException($error);
		    case 9:
		        return new VKApiErrorFloodException($error);
		    case 10:
		        return new VKApiErrorServerException($error);
		    case 11:
		        return new VKApiErrorEnabledInTestException($error);
		    case 12:
		        return new VKApiErrorCompileException($error);
		    case 13:
		        return new VKApiErrorRuntimeException($error);
		    case 14:
		        return new VKApiErrorCaptchaException($error);
		    case 15:
		        return new VKApiErrorAccessException($error);
		    case 16:
		        return new VKApiErrorAuthHttpsException($error);
		    case 17:
		        return new VKApiErrorAuthValidationException($error);
		    case 18:
		        return new VKApiErrorUserDeletedException($error);
		    case 19:
		        return new VKApiErrorBlockedException($error);
		    case 20:
		        return new VKApiErrorMethodPermissionException($error);
		    case 21:
		        return new VKApiErrorMethodAdsException($error);
		    case 22:
		        return new VKApiErrorUploadException($error);
		    case 23:
		        return new VKApiErrorMethodDisabledException($error);
		    case 24:
		        return new VKApiErrorNeedConfirmationException($error);
		    case 25:
		        return new VKApiErrorNeedTokenConfirmationException($error);
		    case 26:
		        return new VKApiErrorInvalidReceiptException($error);
		    case 27:
		        return new VKApiErrorGroupAuthException($error);
		    case 28:
		        return new VKApiErrorAppAuthException($error);
		    case 29:
		        return new VKApiErrorRateLimitException($error);
		    case 30:
		        return new VKApiErrorPrivateProfileException($error);
		    case 100:
		        return new VKApiErrorParamException($error);
		    case 101:
		        return new VKApiErrorParamApiIdException($error);
		    case 102:
		        return new VKApiErrorVerifNeededException($error);
		    case 103:
		        return new VKApiErrorLimitsException($error);
		    case 104:
		        return new VKApiErrorNotFoundException($error);
		    case 105:
		        return new VKApiErrorSaveFileException($error);
		    case 106:
		        return new VKApiErrorActionFailedException($error);
		    case 111:
		        return new VKApiErrorParamCountException($error);
		    case 112:
		        return new VKApiErrorParamScoreException($error);
		    case 113:
		        return new VKApiErrorParamUserIdException($error);
		    case 114:
		        return new VKApiErrorParamAlbumIdException($error);
		    case 118:
		        return new VKApiErrorParamServerException($error);
		    case 119:
		        return new VKApiErrorParamTitleException($error);
		    case 121:
		        return new VKApiErrorParamHashException($error);
		    case 122:
		        return new VKApiErrorParamPhotosException($error);
		    case 123:
		        return new VKApiErrorParamAudioException($error);
		    case 124:
		        return new VKApiErrorParamStatusException($error);
		    case 125:
		        return new VKApiErrorParamGroupIdException($error);
		    case 129:
		        return new VKApiErrorParamPhotoException($error);
		    case 130:
		        return new VKApiErrorParamQuestionTextException($error);
		    case 131:
		        return new VKApiErrorParamQuestionIdException($error);
		    case 132:
		        return new VKApiErrorParamQuestionAccessException($error);
		    case 133:
		        return new VKApiErrorParamQuestionLimitException($error);
		    case 134:
		        return new VKApiErrorParamQuestionAnswerIdException($error);
		    case 136:
		        return new VKApiErrorParamQuestionAnswerFloodException($error);
		    case 140:
		        return new VKApiErrorParamPageIdException($error);
		    case 141:
		        return new VKApiErrorAccessPageException($error);
		    case 145:
		        return new VKApiErrorPrefixOccupiedException($error);
		    case 146:
		        return new VKApiErrorMobileNotActivatedException($error);
		    case 147:
		        return new VKApiErrorInsufficientFundsException($error);
		    case 148:
		        return new VKApiErrorAccessMenuException($error);
		    case 150:
		        return new VKApiErrorParamTimestampException($error);
		    case 151:
		        return new VKApiErrorParamVotesException($error);
		    case 152:
		        return new VKApiErrorParamUserFromException($error);
		    case 153:
		        return new VKApiErrorParamUserToException($error);
		    case 154:
		        return new VKApiErrorParamDateFromException($error);
		    case 155:
		        return new VKApiErrorParamDateToException($error);
		    case 156:
		        return new VKApiErrorParamLimitException($error);
		    case 160:
		        return new VKApiErrorParamWallIdException($error);
		    case 171:
		        return new VKApiErrorFriendsListIdException($error);
		    case 172:
		        return new VKApiErrorFriendsListNameException($error);
		    case 173:
		        return new VKApiErrorFriendsListLimitException($error);
		    case 174:
		        return new VKApiErrorFriendsAddYourselfException($error);
		    case 175:
		        return new VKApiErrorFriendsAddInEnemyException($error);
		    case 176:
		        return new VKApiErrorFriendsAddEnemyException($error);
		    case 177:
		        return new VKApiErrorFriendsAddNotFoundException($error);
		    case 180:
		        return new VKApiErrorParamNoteIdException($error);
		    case 181:
		        return new VKApiErrorAccessNoteException($error);
		    case 182:
		        return new VKApiErrorAccessNoteCommentException($error);
		    case 183:
		        return new VKApiErrorAccessCommentException($error);
		    case 190:
		        return new VKApiErrorSameCheckinException($error);
		    case 191:
		        return new VKApiErrorAccessCheckinException($error);
		    case 200:
		        return new VKApiErrorAccessAlbumException($error);
		    case 201:
		        return new VKApiErrorAccessAudioException($error);
		    case 203:
		        return new VKApiErrorAccessGroupException($error);
		    case 204:
		        return new VKApiErrorAccessVideoException($error);
		    case 205:
		        return new VKApiErrorAccessMarketException($error);
		    case 210:
		        return new VKApiErrorWallAccessPostException($error);
		    case 211:
		        return new VKApiErrorWallAccessCommentException($error);
		    case 212:
		        return new VKApiErrorWallAccessRepliesException($error);
		    case 213:
		        return new VKApiErrorWallAccessAddReplyException($error);
		    case 214:
		        return new VKApiErrorWallAddPostException($error);
		    case 215:
		        return new VKApiErrorWallAlreadyLikedException($error);
		    case 216:
		        return new VKApiErrorWallAlreadyUnlikedException($error);
		    case 217:
		        return new VKApiErrorWallAlreadyPublishedException($error);
		    case 219:
		        return new VKApiErrorWallAdsPublishedException($error);
		    case 220:
		        return new VKApiErrorWallTooManyRecipientsException($error);
		    case 221:
		        return new VKApiErrorStatusNoAudioException($error);
		    case 222:
		        return new VKApiErrorWallLinksForbiddenException($error);
		    case 223:
		        return new VKApiErrorWallReplyOwnerFloodException($error);
		    case 224:
		        return new VKApiErrorWallAdsPostLimitReachedException($error);
		    case 230:
		        return new VKApiErrorLikesIsLikedException($error);
		    case 231:
		        return new VKApiErrorLikesIsUnlikedException($error);
		    case 240:
		        return new VKApiErrorFansAccessListException($error);
		    case 250:
		        return new VKApiErrorPollsAccessException($error);
		    case 251:
		        return new VKApiErrorPollsPollIdException($error);
		    case 252:
		        return new VKApiErrorPollsAnswerIdException($error);
		    case 253:
		        return new VKApiErrorPollsAccessWithoutVoteException($error);
		    case 260:
		        return new VKApiErrorAccessGroupsException($error);
		    case 270:
		        return new VKApiErrorAudioClaimedException($error);
		    case 271:
		        return new VKApiErrorAudioAlbumDuplicateException($error);
		    case 272:
		        return new VKApiErrorAudioForbiddenException($error);
		    case 300:
		        return new VKApiErrorAlbumFullException($error);
		    case 301:
		        return new VKApiErrorFilenameException($error);
		    case 302:
		        return new VKApiErrorAlbumsLimitException($error);
		    case 302:
		        return new VKApiErrorFilesizeException($error);
		    case 500:
		        return new VKApiErrorVotesPermissionException($error);
		    case 503:
		        return new VKApiErrorVotesException($error);
		    case 504:
		        return new VKApiErrorBalanceException($error);
		    case 505:
		        return new VKApiErrorWithdrawException($error);
		    case 506:
		        return new VKApiErrorParamAmountException($error);
		    case 507:
		        return new VKApiErrorTransactionStatusException($error);
		    case 508:
		        return new VKApiErrorTransactionNotFoundException($error);
		    case 550:
		        return new VKApiErrorVkpayMaxCashbackCountException($error);
		    case 600:
		        return new VKApiErrorAdsPermissionException($error);
		    case 601:
		        return new VKApiErrorWeightedFloodException($error);
		    case 602:
		        return new VKApiErrorAdsPartialSuccessException($error);
		    case 603:
		        return new VKApiErrorAdsSpecificException($error);
		    case 604:
		        return new VKApiErrorAdsParamDomainInvalidException($error);
		    case 605:
		        return new VKApiErrorAdsParamDomainForbiddenException($error);
		    case 606:
		        return new VKApiErrorAdsParamDomainReservedException($error);
		    case 607:
		        return new VKApiErrorAdsParamDomainOccupiedException($error);
		    case 608:
		        return new VKApiErrorAdsParamDomainActiveException($error);
		    case 609:
		        return new VKApiErrorAdsParamDomainAppInvalidException($error);
		    case 610:
		        return new VKApiErrorAdsParamDomainAppForbiddenException($error);
		    case 611:
		        return new VKApiErrorAdsAppNotVerifiedException($error);
		    case 612:
		        return new VKApiErrorAppNotInSiteDomainsException($error);
		    case 613:
		        return new VKApiErrorAdsAppBlockedException($error);
		    case 614:
		        return new VKApiErrorAdsParamDomainWrongTypeException($error);
		    case 615:
		        return new VKApiErrorAdsParamDomainGroupInvalidException($error);
		    case 616:
		        return new VKApiErrorAdsParamDomainGroupForbiddenException($error);
		    case 617:
		        return new VKApiErrorAdsParamDomainAppBlockedException($error);
		    case 618:
		        return new VKApiErrorAdsParamDomainGroupNotOpenException($error);
		    case 619:
		        return new VKApiErrorAdsParamDomainGroupNotPossibleYetException($error);
		    case 620:
		        return new VKApiErrorAdsParamDomainGroupBlockedException($error);
		    case 621:
		        return new VKApiErrorAdsParamDomainGroupForbiddenLinksException($error);
		    case 622:
		        return new VKApiErrorAdsParamDomainGroupForbiddenSearchException($error);
		    case 623:
		        return new VKApiErrorAdsParamDomainGroupForbiddenCoverException($error);
		    case 624:
		        return new VKApiErrorAdsParamDomainGroupWrongCategoryException($error);
		    case 625:
		        return new VKApiErrorAdsParamDomainGroupWrongNameException($error);
		    case 626:
		        return new VKApiErrorAdsParamDomainGroupLowPostsReachException($error);
		    case 627:
		        return new VKApiErrorAdsParamDomainGroupWrongClassException($error);
		    case 628:
		        return new VKApiErrorAdsParamDomainGroupRecentlyCreatedException($error);
		    case 629:
		        return new VKApiErrorAdsObjectDeletedException($error);
		    case 630:
		        return new VKApiErrorAdsLookalikeRequestAlreadyInProgressException($error);
		    case 631:
		        return new VKApiErrorAdsLookalikeRequestMaxCountPerDayReachedException($error);
		    case 632:
		        return new VKApiErrorAdsLookalikeRequestAudienceTooSmallException($error);
		    case 633:
		        return new VKApiErrorAdsLookalikeRequestAudienceTooLargeException($error);
		    case 634:
		        return new VKApiErrorAdsLookalikeRequestExportAlreadyInProgressException($error);
		    case 635:
		        return new VKApiErrorAdsLookalikeRequestExportMaxCountPerDayReachedException($error);
		    case 636:
		        return new VKApiErrorAdsLookalikeRequestExportRetargetingGroupLimitException($error);
		    case 637:
		        return new VKApiErrorAdsParamDomainGroupNemesisPunishmentException($error);
		    case 700:
		        return new VKApiErrorGroupChangeCreatorException($error);
		    case 701:
		        return new VKApiErrorGroupNotInClubException($error);
		    case 702:
		        return new VKApiErrorGroupTooManyOfficersException($error);
		    case 800:
		        return new VKApiErrorVideoAlreadyAddedException($error);
		    case 801:
		        return new VKApiErrorVideoCommentsClosedException($error);
		    case 900:
		        return new VKApiErrorMessagesUserBlockedException($error);
		    case 901:
		        return new VKApiErrorMessagesDenySendException($error);
		    case 902:
		        return new VKApiErrorMessagesPrivacyException($error);
		    case 903:
		        return new VKApiErrorMessagesPhoneNumberNotFoundException($error);
		    case 904:
		        return new VKApiErrorMessagesPhoneNumberNotOnlineException($error);
		    case 905:
		        return new VKApiErrorMessagesPhoneNumberNoMobileAppException($error);
		    case 906:
		        return new VKApiErrorMessagesPhoneNumberNotVerifiedException($error);
		    case 907:
		        return new VKApiErrorMessagesTooOldPtsException($error);
		    case 908:
		        return new VKApiErrorMessagesTooNewPtsException($error);
		    case 909:
		        return new VKApiErrorMessagesEditExpiredException($error);
		    case 910:
		        return new VKApiErrorMessagesTooBigException($error);
		    case 911:
		        return new VKApiErrorMessagesKeyboardInvalidException($error);
		    case 912:
		        return new VKApiErrorMessagesChatBotFeatureException($error);
		    case 913:
		        return new VKApiErrorMessagesTooLongForwardsException($error);
		    case 914:
		        return new VKApiErrorMessagesTooLongMessageException($error);
		    case 915:
		        return new VKApiErrorMessagesGroupMessagesOffException($error);
		    case 916:
		        return new VKApiErrorMessagesGroupMessagesForbiddenException($error);
		    case 917:
		        return new VKApiErrorMessagesChatUserNoAccessException($error);
		    case 918:
		        return new VKApiErrorMessagesEmailNoAccessException($error);
		    case 919:
		        return new VKApiErrorMessagesCantSeeInviteLinkException($error);
		    case 920:
		        return new VKApiErrorMessagesEditKindDisallowedException($error);
		    case 921:
		        return new VKApiErrorMessagesCantFwdException($error);
		    case 922:
		        return new VKApiErrorMessagesChatUserLeftException($error);
		    case 923:
		        return new VKApiErrorMessagesOldReceiverAppException($error);
		    case 924:
		        return new VKApiErrorMessagesCantDeleteForAllException($error);
		    case 925:
		        return new VKApiErrorMessagesChatNotAdminException($error);
		    case 926:
		        return new VKApiErrorMessagesCantCallException($error);
		    case 927:
		        return new VKApiErrorMessagesChatNotExistException($error);
		    case 928:
		        return new VKApiErrorMessagesCallPrivacyException($error);
		    case 929:
		        return new VKApiErrorMessagesCantInitCallException($error);
		    case 930:
		        return new VKApiErrorMessagesCallInvalidIdException($error);
		    case 931:
		        return new VKApiErrorMessagesCantChangeInviteLinkException($error);
		    case 932:
		        return new VKApiErrorMessagesGroupPeerAccessException($error);
		    case 933:
		        return new VKApiErrorMessagesPhoneNumberNoAccessException($error);
		    case 1000:
		        return new VKApiErrorParamPhoneException($error);
		    case 1001:
		        return new VKApiErrorNoUserByPhoneException($error);
		    case 1004:
		        return new VKApiErrorPhoneAlreadyUsedException($error);
		    case 1103:
		        return new VKApiErrorAuthParamDigestException($error);
		    case 1104:
		        return new VKApiErrorAuthParamLoginException($error);
		    case 1105:
		        return new VKApiErrorAuthFloodErrorException($error);
		    case 1107:
		        return new VKApiErrorAuthFailException($error);
		    case 1108:
		        return new VKApiErrorAuthParamNonceException($error);
		    case 1109:
		        return new VKApiErrorAuthNoTokenException($error);
		    case 1110:
		        return new VKApiErrorAuthParamCodeException($error);
		    case 1111:
		        return new VKApiErrorAuthParamPasswordException($error);
		    case 1112:
		        return new VKApiErrorAuthDelayException($error);
		    case 1150:
		        return new VKApiErrorParamDocIdException($error);
		    case 1151:
		        return new VKApiErrorParamDocDeleteAccessException($error);
		    case 1152:
		        return new VKApiErrorParamDocTitleException($error);
		    case 1153:
		        return new VKApiErrorParamDocAccessException($error);
		    case 1160:
		        return new VKApiErrorPhotoChangedException($error);
		    case 1170:
		        return new VKApiErrorTooManyListsException($error);
		    case 1190:
		        return new VKApiErrorGiftNotAvailableException($error);
		    case 1210:
		        return new VKApiErrorProductNotAvailableException($error);
		    case 1211:
		        return new VKApiErrorProductNotFoundException($error);
		    case 1250:
		        return new VKApiErrorAppsTooManyPointsException($error);
		    case 1251:
		        return new VKApiErrorAppsAlreadyUnlockedException($error);
		    case 1252:
		        return new VKApiErrorAppsPaymentsNotAllowedException($error);
		    case 1253:
		        return new VKApiErrorAppsPaymentsLimitException($error);
		    case 1254:
		        return new VKApiErrorAppsPaymentsWaitingItemException($error);
		    case 1255:
		        return new VKApiErrorAppsOrderErrorException($error);
		    case 1256:
		        return new VKApiErrorAppsSubscriptionNotFoundException($error);
		    case 1257:
		        return new VKApiErrorAppsSubscriptionInvalidStatusException($error);
		    case 1258:
		        return new VKApiErrorAppsAlreadyAddedException($error);
		    case 1259:
		        return new VKApiErrorAppsMenuTooManyAppsException($error);
		    case 1260:
		        return new VKApiErrorInvalidAddressException($error);
		    case 1300:
		        return new VKApiErrorGoogleTokenErrorException($error);
		    case 1310:
		        return new VKApiErrorCommunitiesCatalogDisabledException($error);
		    case 1311:
		        return new VKApiErrorCommunitiesCategoriesDisabledException($error);
		    case 1400:
		        return new VKApiErrorMarketRestoreTooLateException($error);
		    case 1401:
		        return new VKApiErrorMarketCommentsClosedException($error);
		    case 1402:
		        return new VKApiErrorMarketAlbumNotFoundException($error);
		    case 1403:
		        return new VKApiErrorMarketItemNotFoundException($error);
		    case 1404:
		        return new VKApiErrorMarketItemAlreadyAddedException($error);
		    case 1405:
		        return new VKApiErrorMarketTooManyItemsException($error);
		    case 1406:
		        return new VKApiErrorMarketTooManyItemsInAlbumException($error);
		    case 1407:
		        return new VKApiErrorMarketTooManyAlbumsException($error);
		    case 1408:
		        return new VKApiErrorMarketItemHasBadLinksException($error);
		    case 1500:
		        return new VKApiErrorTicketsNoAccessException($error);
		    case 1501:
		        return new VKApiErrorTicketsCannotGetNewTicketException($error);
		    case 1502:
		        return new VKApiErrorTicketsGetTicketFailedException($error);
		    case 1503:
		        return new VKApiErrorTicketsNoTicketException($error);
		    case 1504:
		        return new VKApiErrorTicketsNotYourTicketException($error);
		    case 1505:
		        return new VKApiErrorTicketsPassSameSectionException($error);
		    case 1506:
		        return new VKApiErrorTicketsPassClosedSectionException($error);
		    case 1600:
		        return new VKApiErrorStoryExpiredException($error);
		    case 1601:
		        return new VKApiErrorStoryDoesntExistException($error);
		    case 1602:
		        return new VKApiErrorStoryIncorrectReplyPrivacyException($error);
		    case 1800:
		        return new VKApiErrorRestoreNoAccessException($error);
		    case 1900:
		        return new VKApiErrorPrettyCardsCardNotFoundException($error);
		    case 1901:
		        return new VKApiErrorPrettyCardsTooManyCardsException($error);
		    case 1902:
		        return new VKApiErrorPrettyCardsCardIsConnectedToPostException($error);
		    case 2000:
		        return new VKApiErrorCallbackApiServersLimitException($error);
		    case 2100:
		        return new VKApiErrorStickersNotPurchasedException($error);
		    case 2101:
		        return new VKApiErrorStickersTooManyFavoritesException($error);
		    case 2102:
		        return new VKApiErrorStickersNotFavoriteException($error);
		    case 2201:
		        return new VKApiErrorStreamQuizRefcodeNotExistsException($error);
		    case 2202:
		        return new VKApiErrorStreamQuizActionCheckFailException($error);
		    case 3001:
		        return new VKApiErrorBotNotInChatException($error);
		    default:
		        return new VKApiException($error->getErrorCode(), $error->getErrorMsg(), $error);}
	}
}
