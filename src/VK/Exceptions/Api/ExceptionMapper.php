<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class ExceptionMapper {
    public static function parse(VKApiError $error) {
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
            case 29:
                return new VKApiRateLimitException($error);
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
            case 148:
                return new VKApiAccessMenuException($error);
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
            case 180:
                return new VKApiParamNoteIdException($error);
            case 181:
                return new VKApiAccessNoteException($error);
            case 182:
                return new VKApiAccessNoteCommentException($error);
            case 183:
                return new VKApiAccessCommentException($error);
            case 190:
                return new VKApiSameCheckinException($error);
            case 191:
                return new VKApiAccessCheckinException($error);
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
            case 224:
                return new VKApiWallAdsPostLimitReachedException($error);
            case 250:
                return new VKApiPollsAccessException($error);
            case 251:
                return new VKApiPollsPollIdException($error);
            case 252:
                return new VKApiPollsAnswerIdException($error);
            case 260:
                return new VKApiAccessGroupsException($error);
            case 300:
                return new VKApiAlbumFullException($error);
            case 302:
                return new VKApiAlbumsLimitException($error);
            case 500:
                return new VKApiVotesPermissionException($error);
            case 503:
                return new VKApiVotesException($error);
            case 600:
                return new VKApiAdsPermissionException($error);
            case 601:
                return new VKApiWeightedFloodException($error);
            case 602:
                return new VKApiAdsPartialSuccessException($error);
            case 603:
                return new VKApiAdsSpecificException($error);
            case 700:
                return new VKApiGroupChangeCreatorException($error);
            case 701:
                return new VKApiGroupNotInClubException($error);
            case 702:
                return new VKApiGroupTooManyOfficersException($error);
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
            case 909:
                return new VKApiMessagesPrivacyException($error);
            case 910:
                return new VKApiMessagesTooBigException($error);
            case 911:
                return new VKApiMessagesKeyboardInvalidException($error);
            case 912:
                return new VKApiMessagesChatBotFeatureException($error);
            case 913:
                return new VKApiMessagesForwardAmountExceededException($error);
            case 914:
                return new VKApiMessagesTooLongMessageException($error);
            case 917:
                return new VKApiMessagesChatUserNoAccessException($error);
            case 920:
                return new VKApiMessagesEditKindDisallowedException($error);
            case 921:
                return new VKApiMessagesForwardException($error);
            case 1000:
                return new VKApiParamPhoneException($error);
            case 1004:
                return new VKApiPhoneAlreadyUsedException($error);
            case 1105:
                return new VKApiAuthFloodException($error);
            case 1110:
                return new VKApiAuthParamCodeException($error);
            case 1111:
                return new VKApiAuthParamPasswordException($error);
            case 1112:
                return new VKApiAuthDelayException($error);
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
            case 1260:
                return new VKApiInvalidAddressException($error);
            case 1310:
                return new VKApiCommunitiesCatalogDisabledException($error);
            case 1311:
                return new VKApiCommunitiesCategoriesDisabledException($error);
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
            case 1600:
                return new VKApiStoryExpiredException($error);
            case 1602:
                return new VKApiIncorrectReplyPrivacyException($error);
            default:
                return new VKApiException($error->getErrorCode(), $error->getErrorMsg(), $error);
        }
    }
}
