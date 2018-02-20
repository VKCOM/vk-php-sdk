<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class ExceptionMapper {
    public static function parse(VKApiError $error) {
        switch($error->getErrorCode()) {
            case 1:
                return new VKApiUnknownException($error->getErrorMsg());
            case 2:
                return new VKApiDisabledException($error->getErrorMsg());
            case 3:
                return new VKApiMethodException($error->getErrorMsg());
            case 4:
                return new VKApiSignatureException($error->getErrorMsg());
            case 5:
                return new VKApiAuthException($error->getErrorMsg());
            case 6:
                return new VKApiTooManyException($error->getErrorMsg());
            case 7:
                return new VKApiPermissionException($error->getErrorMsg());
            case 8:
                return new VKApiRequestException($error->getErrorMsg());
            case 9:
                return new VKApiFloodException($error->getErrorMsg());
            case 10:
                return new VKApiServerException($error->getErrorMsg());
            case 11:
                return new VKApiEnabledInTestException($error->getErrorMsg());
            case 14:
                return new VKApiCaptchaException($error->getErrorMsg());
            case 15:
                return new VKApiAccessException($error->getErrorMsg());
            case 16:
                return new VKApiAuthHttpsException($error->getErrorMsg());
            case 17:
                return new VKApiAuthValidationException($error->getErrorMsg());
            case 18:
                return new VKApiUserDeletedException($error->getErrorMsg());
            case 19:
                return new VKApiBlockedException($error->getErrorMsg());
            case 20:
                return new VKApiMethodPermissionException($error->getErrorMsg());
            case 21:
                return new VKApiMethodAdsException($error->getErrorMsg());
            case 22:
                return new VKApiUploadException($error->getErrorMsg());
            case 23:
                return new VKApiMethodDisabledException($error->getErrorMsg());
            case 24:
                return new VKApiNeedConfirmationException($error->getErrorMsg());
            case 100:
                return new VKApiParamException($error->getErrorMsg());
            case 101:
                return new VKApiParamApiIdException($error->getErrorMsg());
            case 103:
                return new VKApiLimitsException($error->getErrorMsg());
            case 104:
                return new VKApiNotFoundException($error->getErrorMsg());
            case 105:
                return new VKApiSaveFileException($error->getErrorMsg());
            case 106:
                return new VKApiActionFailedException($error->getErrorMsg());
            case 113:
                return new VKApiParamUserIdException($error->getErrorMsg());
            case 114:
                return new VKApiParamAlbumIdException($error->getErrorMsg());
            case 118:
                return new VKApiParamServerException($error->getErrorMsg());
            case 119:
                return new VKApiParamTitleException($error->getErrorMsg());
            case 121:
                return new VKApiParamHashException($error->getErrorMsg());
            case 122:
                return new VKApiParamPhotosException($error->getErrorMsg());
            case 125:
                return new VKApiParamGroupIdException($error->getErrorMsg());
            case 129:
                return new VKApiParamPhotoException($error->getErrorMsg());
            case 140:
                return new VKApiParamPageIdException($error->getErrorMsg());
            case 141:
                return new VKApiAccessPageException($error->getErrorMsg());
            case 146:
                return new VKApiMobileNotActivatedException($error->getErrorMsg());
            case 147:
                return new VKApiInsufficientFundsException($error->getErrorMsg());
            case 148:
                return new VKApiAccessMenuException($error->getErrorMsg());
            case 150:
                return new VKApiParamTimestampException($error->getErrorMsg());
            case 171:
                return new VKApiFriendsListIdException($error->getErrorMsg());
            case 173:
                return new VKApiFriendsListLimitException($error->getErrorMsg());
            case 174:
                return new VKApiFriendsAddYourselfException($error->getErrorMsg());
            case 175:
                return new VKApiFriendsAddInEnemyException($error->getErrorMsg());
            case 176:
                return new VKApiFriendsAddEnemyException($error->getErrorMsg());
            case 180:
                return new VKApiParamNoteIdException($error->getErrorMsg());
            case 181:
                return new VKApiAccessNoteException($error->getErrorMsg());
            case 182:
                return new VKApiAccessNoteCommentException($error->getErrorMsg());
            case 183:
                return new VKApiAccessCommentException($error->getErrorMsg());
            case 190:
                return new VKApiSameCheckinException($error->getErrorMsg());
            case 191:
                return new VKApiAccessCheckinException($error->getErrorMsg());
            case 200:
                return new VKApiAccessAlbumException($error->getErrorMsg());
            case 201:
                return new VKApiAccessAudioException($error->getErrorMsg());
            case 203:
                return new VKApiAccessGroupException($error->getErrorMsg());
            case 204:
                return new VKApiAccessVideoException($error->getErrorMsg());
            case 205:
                return new VKApiAccessMarketException($error->getErrorMsg());
            case 210:
                return new VKApiWallAccessPostException($error->getErrorMsg());
            case 211:
                return new VKApiWallAccessCommentException($error->getErrorMsg());
            case 212:
                return new VKApiWallAccessRepliesException($error->getErrorMsg());
            case 213:
                return new VKApiWallAccessAddReplyException($error->getErrorMsg());
            case 214:
                return new VKApiWallAddPostException($error->getErrorMsg());
            case 219:
                return new VKApiWallAdsPublishedException($error->getErrorMsg());
            case 220:
                return new VKApiWallTooManyRecipientsException($error->getErrorMsg());
            case 221:
                return new VKApiStatusNoAudioException($error->getErrorMsg());
            case 222:
                return new VKApiWallLinksForbiddenException($error->getErrorMsg());
            case 250:
                return new VKApiPollsAccessException($error->getErrorMsg());
            case 251:
                return new VKApiPollsPollIdException($error->getErrorMsg());
            case 252:
                return new VKApiPollsAnswerIdException($error->getErrorMsg());
            case 260:
                return new VKApiAccessGroupsException($error->getErrorMsg());
            case 300:
                return new VKApiAlbumFullException($error->getErrorMsg());
            case 302:
                return new VKApiAlbumsLimitException($error->getErrorMsg());
            case 500:
                return new VKApiVotesPermissionException($error->getErrorMsg());
            case 503:
                return new VKApiVotesException($error->getErrorMsg());
            case 600:
                return new VKApiAdsPermissionException($error->getErrorMsg());
            case 601:
                return new VKApiWeightedFloodException($error->getErrorMsg());
            case 602:
                return new VKApiAdsPartialSuccessException($error->getErrorMsg());
            case 603:
                return new VKApiAdsSpecificException($error->getErrorMsg());
            case 700:
                return new VKApiGroupChangeCreatorException($error->getErrorMsg());
            case 701:
                return new VKApiGroupNotInClubException($error->getErrorMsg());
            case 702:
                return new VKApiGroupTooManyOfficersException($error->getErrorMsg());
            case 800:
                return new VKApiVideoAlreadyAddedException($error->getErrorMsg());
            case 801:
                return new VKApiVideoCommentsClosedException($error->getErrorMsg());
            case 900:
                return new VKApiMessagesUserBlockedException($error->getErrorMsg());
            case 901:
                return new VKApiMessagesDenySendException($error->getErrorMsg());
            case 902:
                return new VKApiMessagesPrivacyException($error->getErrorMsg());
            case 913:
                return new VKApiMessagesForwardAmountExceededException($error->getErrorMsg());
            case 921:
                return new VKApiMessagesForwardException($error->getErrorMsg());
            case 1000:
                return new VKApiParamPhoneException($error->getErrorMsg());
            case 1004:
                return new VKApiPhoneAlreadyUsedException($error->getErrorMsg());
            case 1105:
                return new VKApiAuthFloodException($error->getErrorMsg());
            case 1110:
                return new VKApiAuthParamCodeException($error->getErrorMsg());
            case 1111:
                return new VKApiAuthParamPasswordException($error->getErrorMsg());
            case 1112:
                return new VKApiAuthDelayException($error->getErrorMsg());
            case 1150:
                return new VKApiParamDocIdException($error->getErrorMsg());
            case 1151:
                return new VKApiParamDocDeleteAccessException($error->getErrorMsg());
            case 1152:
                return new VKApiParamDocTitleException($error->getErrorMsg());
            case 1153:
                return new VKApiParamDocAccessException($error->getErrorMsg());
            case 1160:
                return new VKApiPhotoChangedException($error->getErrorMsg());
            case 1170:
                return new VKApiTooManyListsException($error->getErrorMsg());
            case 1251:
                return new VKApiAppsAlreadyUnlockedException($error->getErrorMsg());
            case 1260:
                return new VKApiInvalidAddressException($error->getErrorMsg());
            case 1310:
                return new VKApiCommunitiesCatalogDisabledException($error->getErrorMsg());
            case 1311:
                return new VKApiCommunitiesCategoriesDisabledException($error->getErrorMsg());
            case 1400:
                return new VKApiMarketRestoreTooLateException($error->getErrorMsg());
            case 1401:
                return new VKApiMarketCommentsClosedException($error->getErrorMsg());
            case 1402:
                return new VKApiMarketAlbumNotFoundException($error->getErrorMsg());
            case 1403:
                return new VKApiMarketItemNotFoundException($error->getErrorMsg());
            case 1404:
                return new VKApiMarketItemAlreadyAddedException($error->getErrorMsg());
            case 1405:
                return new VKApiMarketTooManyItemsException($error->getErrorMsg());
            case 1406:
                return new VKApiMarketTooManyItemsInAlbumException($error->getErrorMsg());
            case 1407:
                return new VKApiMarketTooManyAlbumsException($error->getErrorMsg());
            default:
                return new VKApiException($error->getErrorCode(), $error->getErrorMsg(), 'Unknown error');
        }
    }
}
