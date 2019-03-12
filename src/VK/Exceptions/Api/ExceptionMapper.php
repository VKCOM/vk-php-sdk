<?php
namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

/**
 */
class ExceptionMapper {

	/**
	 * @param VkApiError $error
	 * @return Exception
	 */
	public static function parse(VkApiError $error) {
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
		    case 20:
		        return new VKApiMethodPermissionException($error);
		    case 21:
		        return new VKApiMethodAdsException($error);
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
		    case 100:
		        return new VKApiParamException($error);
		    case 101:
		        return new VKApiParamApiIdException($error);
		    case 113:
		        return new VKApiParamUserIdException($error);
		    case 150:
		        return new VKApiParamTimestampException($error);
		    case 200:
		        return new VKApiAccessAlbumException($error);
		    case 201:
		        return new VKApiAccessAudioException($error);
		    case 203:
		        return new VKApiAccessGroupException($error);
		    case 300:
		        return new VKApiAlbumFullException($error);
		    case 500:
		        return new VKApiVotesPermissionException($error);
		    case 600:
		        return new VKApiAdsPermissionException($error);
		    case 603:
		        return new VKApiAdsSpecificException($error);
		    default:
		        return new VKApiException($error->getErrorCode(), $error->getErrorMsg(), $error);}
	}
}
