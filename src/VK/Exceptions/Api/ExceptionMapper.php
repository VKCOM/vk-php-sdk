<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class ExceptionMapper {
    public static function parse(VKApiError $error) {
        switch ($error->getErrorCode()) {
            case 12:
                return new VKApiUnableToCompileCodeException($error);
            case 13:
                return new VKApiRuntimeOccurredDuringCodeInvocationException($error);
            case 19:
                return new VKApiContentBlockedException($error);
            case 22:
                return new VKApiUploadException($error);
            case 35:
                return new VKApiClientUpdateNeededException($error);
            case 36:
                return new VKApiMethodExecutionWasInterruptedDueToTimeoutException($error);
            case 103:
                return new VKApiOutOfLimitsException($error);
            case 104:
                return new VKApiNotFoundException($error);
            case 105:
                return new VKApiCouldntSaveFileException($error);
            case 106:
                return new VKApiUnableToProcessActionException($error);
            case 114:
                return new VKApiInvalidAlbumIdException($error);
            case 118:
                return new VKApiInvalidServerException($error);
            case 119:
                return new VKApiInvalidTitleException($error);
            case 121:
                return new VKApiInvalidHashException($error);
            case 122:
                return new VKApiInvalidPhotosException($error);
            case 125:
                return new VKApiInvalidGroupIdException($error);
            case 129:
                return new VKApiInvalidPhotoException($error);
            case 140:
                return new VKApiPageNotFoundException($error);
            case 141:
                return new VKApiAccessToPageDeniedException($error);
            case 146:
                return new VKApiTheMobileNumberOfTheUserIsUnknownException($error);
            case 147:
                return new VKApiApplicationHasInsufficientFundsException($error);
            case 148:
                return new VKApiAccessToTheMenuOfTheUserDeniedException($error);
            case 171:
                return new VKApiInvalidListIdException($error);
            case 173:
                return new VKApiReachedTheMaximumNumberOfListsException($error);
            case 174:
                return new VKApiCannotAddUserHimselfAsFriendException($error);
            case 175:
                return new VKApiCannotAddThisUserToFriendsAsTheyHavePutYouOnTheirBlacklistException($error);
            case 176:
                return new VKApiCannotAddThisUserToFriendsAsYouPutHimOnBlacklistException($error);
            case 177:
                return new VKApiCannotAddThisUserToFriendsAsUserNotFoundException($error);
            case 180:
                return new VKApiNoteNotFoundException($error);
            case 181:
                return new VKApiAccessToNoteDeniedException($error);
            case 182:
                return new VKApiYouCantCommentThisNoteException($error);
            case 183:
                return new VKApiAccessToCommentDeniedException($error);
            case 204:
                return new VKApiAccessDeniedException($error);
            case 205:
                return new VKApiAccessDeniedException($error);
            case 210:
                return new VKApiAccessToWallsPostDeniedException($error);
            case 211:
                return new VKApiAccessToWallsCommentDeniedException($error);
            case 212:
                return new VKApiAccessToPostCommentsDeniedException($error);
            case 213:
                return new VKApiAccessToStatusRepliesDeniedException($error);
            case 214:
                return new VKApiAccessToAddingPostDeniedException($error);
            case 219:
                return new VKApiAdvertisementPostWasRecentlyAddedException($error);
            case 220:
                return new VKApiTooManyRecipientsException($error);
            case 221:
                return new VKApiUserDisabledTrackNameBroadcastException($error);
            case 222:
                return new VKApiHyperlinksAreForbiddenException($error);
            case 223:
                return new VKApiTooManyRepliesException($error);
            case 224:
                return new VKApiTooManyAdsPostsException($error);
            case 225:
                return new VKApiDonutIsDisabledException($error);
            case 232:
                return new VKApiReactionCanNotBeAppliedToTheObjectException($error);
            case 250:
                return new VKApiAccessToPollDeniedException($error);
            case 251:
                return new VKApiInvalidPollIdException($error);
            case 252:
                return new VKApiInvalidAnswerIdException($error);
            case 253:
                return new VKApiAccessDeniedPleaseVoteFirstException($error);
            case 260:
                return new VKApiAccessToTheGroupsListIsDeniedDueToTheUsersPrivacySettingsException($error);
            case 302:
                return new VKApiAlbumsNumberLimitIsReachedException($error);
            case 601:
                return new VKApiPermissionDenied.YouHaveRequestedTooManyActionsThisDay.TryLater.Exception($error);
            case 602:
                return new VKApiSomePartOfTheRequestHasNotBeenCompletedException($error);
            case 629:
                return new VKApiObjectDeletedException($error);
            case 700:
                return new VKApiCannotEditCreatorRoleException($error);
            case 701:
                return new VKApiUserShouldBeInClubException($error);
            case 702:
                return new VKApiTooManyOfficersInClubException($error);
            case 703:
                return new VKApiYouNeedToEnable2faForThisActionException($error);
            case 704:
                return new VKApiUserNeedsToEnable2faForThisActionException($error);
            case 706:
                return new VKApiTooManyAddressesInClubException($error);
            case 711:
                return new VKApiApplicationIsNotInstalledInCommunityException($error);
            case 714:
                return new VKApiInviteLinkIsInvalid-ExpiredDeletedOrNotExistsException($error);
            case 800:
                return new VKApiThisVideoIsAlreadyAddedException($error);
            case 801:
                return new VKApiCommentsForThisVideoAreClosedException($error);
            case 900:
                return new VKApiCantSendMessagesForUsersFromBlacklistException($error);
            case 901:
                return new VKApiCantSendMessagesForUsersWithoutPermissionException($error);
            case 902:
                return new VKApiCantSendMessagesToThisUserDueToTheirPrivacySettingsException($error);
            case 907:
                return new VKApiValueOfTsOrPtsIsTooOldException($error);
            case 908:
                return new VKApiValueOfTsOrPtsIsTooNewException($error);
            case 909:
                return new VKApiCantEditThisMessageBecauseItsTooOldException($error);
            case 910:
                return new VKApiCantSentThisMessageBecauseItsTooBigException($error);
            case 911:
                return new VKApiKeyboardFormatIsInvalidException($error);
            case 912:
                return new VKApiThisIsAChatBotFeatureChangeThisStatusInSettingsException($error);
            case 913:
                return new VKApiTooManyForwardedMessagesException($error);
            case 914:
                return new VKApiMessageIsTooLongException($error);
            case 917:
                return new VKApiYouDontHaveAccessToThisChatException($error);
            case 919:
                return new VKApiYouCantSeeInviteLinkForThisChatException($error);
            case 920:
                return new VKApiCantEditThisKindOfMessageException($error);
            case 921:
                return new VKApiCantForwardTheseMessagesException($error);
            case 924:
                return new VKApiCantDeleteThisMessageForEverybodyException($error);
            case 925:
                return new VKApiYouAreNotAdminOfThisChatException($error);
            case 927:
                return new VKApiChatDoesNotExistException($error);
            case 931:
                return new VKApiYouCantChangeInviteLinkForThisChatException($error);
            case 932:
                return new VKApiYourCommunityCantInteractWithThisPeerException($error);
            case 935:
                return new VKApiUserNotFoundInChatException($error);
            case 936:
                return new VKApiContactNotFoundException($error);
            case 939:
                return new VKApiMessageRequestAlreadySentException($error);
            case 940:
                return new VKApiTooManyPostsInMessagesException($error);
            case 942:
                return new VKApiCannotPinOne-timeStoryException($error);
            case 943:
                return new VKApiCannotUseThisIntentException($error);
            case 944:
                return new VKApiLimitsOverflowForThisIntentException($error);
            case 945:
                return new VKApiChatWasDisabledException($error);
            case 946:
                return new VKApiChatNotSupportedException($error);
            case 947:
                return new VKApiCantAddUserToChatBecauseUserHasNoAccessToGroupException($error);
            case 949:
                return new VKApiCantEditPinnedMessageYetException($error);
            case 950:
                return new VKApiCantSendMessageReplyTimedOutException($error);
            case 1105:
                return new VKApiTooManyAuthAttemptsTryAgainLaterException($error);
            case 1150:
                return new VKApiInvalidDocumentIdException($error);
            case 1151:
                return new VKApiAccessToDocumentDeletingIsDeniedException($error);
            case 1152:
                return new VKApiInvalidDocumentTitleException($error);
            case 1153:
                return new VKApiAccessToDocumentIsDeniedException($error);
            case 1160:
                return new VKApiOriginalPhotoWasChangedException($error);
            case 1170:
                return new VKApiTooManyFeedListsException($error);
            case 1251:
                return new VKApiThisAchievementIsAlreadyUnlockedException($error);
            case 1256:
                return new VKApiSubscriptionNotFoundException($error);
            case 1257:
                return new VKApiSubscriptionIsInInvalidStatusException($error);
            case 1260:
                return new VKApiInvalidScreenNameException($error);
            case 1310:
                return new VKApiCatalogIsNotAvailableForThisUserException($error);
            case 1311:
                return new VKApiCatalogCategoriesAreNotAvailableForThisUserException($error);
            case 1400:
                return new VKApiTooLateForRestoreException($error);
            case 1401:
                return new VKApiCommentsForThisMarketAreClosedException($error);
            case 1402:
                return new VKApiAlbumNotFoundException($error);
            case 1403:
                return new VKApiItemNotFoundException($error);
            case 1404:
                return new VKApiItemAlreadyAddedToAlbumException($error);
            case 1405:
                return new VKApiTooManyItemsException($error);
            case 1406:
                return new VKApiTooManyItemsInAlbumException($error);
            case 1407:
                return new VKApiTooManyAlbumsException($error);
            case 1408:
                return new VKApiItemHasBadLinksInDescriptionException($error);
            case 1409:
                return new VKApiExtendedMarketNotEnabledException($error);
            case 1413:
                return new VKApiGroupingAlreadyHasSuchVariantException($error);
            case 1416:
                return new VKApiVariantNotFoundException($error);
            case 1417:
                return new VKApiPropertyNotFoundException($error);
            case 1425:
                return new VKApiGroupingMustHaveTwoOrMoreItemsException($error);
            case 1426:
                return new VKApiItemMustHaveDistinctPropertiesException($error);
            case 1427:
                return new VKApiCartIsEmptyException($error);
            case 1429:
                return new VKApiSpecifyWidthLengthHeightAndWeightAllTogetherException($error);
            case 1430:
                return new VKApiVkPayStatusCanNotBeChangedException($error);
            case 1431:
                return new VKApiMarketWasAlreadyEnabledInThisGroupException($error);
            case 1432:
                return new VKApiMarketWasAlreadyDisabledInThisGroupException($error);
            case 1433:
                return new VKApiInvalidImageCropFormatException($error);
            case 1434:
                return new VKApiCropBottomRightCornerIsOutsideOfTheImageException($error);
            case 1435:
                return new VKApiCropSizeIsLessThanTheMinimumException($error);
            case 1438:
                return new VKApiMarketNotEnabledException($error);
            case 1600:
                return new VKApiStoryHasAlreadyExpiredException($error);
            case 1602:
                return new VKApiIncorrectReplyPrivacyException($error);
            case 1900:
                return new VKApiCardNotFoundException($error);
            case 1901:
                return new VKApiTooManyCardsException($error);
            case 1902:
                return new VKApiCardIsConnectedToPostException($error);
            case 2000:
                return new VKApiServersNumberLimitIsReachedException($error);
            case 2100:
                return new VKApiStickersAreNotPurchasedException($error);
            case 2101:
                return new VKApiTooManyFavoriteStickersException($error);
            case 2102:
                return new VKApiStickersAreNotFavoriteException($error);
            case 3102:
                return new VKApiSpecifiedLinkIsIncorrect(cantFindSource)Exception($error);
            case 3800:
                return new VKApiCantSetAliexpressTagToThisTypeOfObjectException($error);
            default:
                return new VKApiException($error->getErrorCode(), $error->getErrorMsg(), $error);
        }
    }
}
