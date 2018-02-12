<?php

namespace VK\Exceptions\Api;

use VK\CLient\VKApiError;
use VK\Exceptions\VKClientException;

class ExceptionMapper {
  /**
   * @param VKApiError $error
   * @return ApiAccessAlbumException|ApiAccessAudioException|ApiAccessException|ApiAccessGroupException|ApiAdsPermissionException|ApiAdsSpecificException|ApiAlbumFullException|ApiAuthException|ApiAuthHttpsException|ApiAuthValidationException|ApiCaptchaException|ApiDisabledException|ApiEnabledInTestException|ApiFloodException|ApiMethodAdsException|ApiMethodDisabledException|ApiMethodException|ApiMethodPermissionException|ApiNeedConfirmationException|ApiParamApiIdException|ApiParamException|ApiParamTimestampException|ApiParamUserIdException|ApiPermissionException|ApiRequestException|ApiServerException|ApiSignatureException|ApiTooManyException|ApiUnknownException|ApiUserDeletedException|ApiVotesPermissionException
   * @throws VKClientException
   */
    public static function parse(VKApiError $error) {
        switch($error->getErrorCode()) {
            case 1:
                return new ApiUnknownException($error->getErrorMsg());
            case 2:
                return new ApiDisabledException($error->getErrorMsg());
            case 3:
                return new ApiMethodException($error->getErrorMsg());
            case 4:
                return new ApiSignatureException($error->getErrorMsg());
            case 5:
                return new ApiAuthException($error->getErrorMsg());
            case 6:
                return new ApiTooManyException($error->getErrorMsg());
            case 7:
                return new ApiPermissionException($error->getErrorMsg());
            case 8:
                return new ApiRequestException($error->getErrorMsg());
            case 9:
                return new ApiFloodException($error->getErrorMsg());
            case 10:
                return new ApiServerException($error->getErrorMsg());
            case 11:
                return new ApiEnabledInTestException($error->getErrorMsg());
            case 14:
                return new ApiCaptchaException($error->getErrorMsg());
            case 15:
                return new ApiAccessException($error->getErrorMsg());
            case 16:
                return new ApiAuthHttpsException($error->getErrorMsg());
            case 17:
                return new ApiAuthValidationException($error->getErrorMsg());
            case 20:
                return new ApiMethodPermissionException($error->getErrorMsg());
            case 21:
                return new ApiMethodAdsException($error->getErrorMsg());
            case 23:
                return new ApiMethodDisabledException($error->getErrorMsg());
            case 24:
                return new ApiNeedConfirmationException($error->getErrorMsg());
            case 500:
                return new ApiVotesPermissionException($error->getErrorMsg());
            case 201:
                return new ApiAccessAudioException($error->getErrorMsg());
            case 203:
                return new ApiAccessGroupException($error->getErrorMsg());
            case 113:
                return new ApiParamUserIdException($error->getErrorMsg());
            case 100:
                return new ApiParamException($error->getErrorMsg());
            case 300:
                return new ApiAlbumFullException($error->getErrorMsg());
            case 200:
                return new ApiAccessAlbumException($error->getErrorMsg());
            case 603:
                return new ApiAdsSpecificException($error->getErrorMsg());
            case 600:
                return new ApiAdsPermissionException($error->getErrorMsg());
            case 150:
                return new ApiParamTimestampException($error->getErrorMsg());
            case 101:
                return new ApiParamApiIdException($error->getErrorMsg());
            case 18:
                return new ApiUserDeletedException($error->getErrorMsg());

        }

        throw new VKClientException();
    }
}
