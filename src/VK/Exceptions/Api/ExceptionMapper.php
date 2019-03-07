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
		    case 20:
		        return new VKApiErrorMethodPermissionException($error);
		    case 21:
		        return new VKApiErrorMethodAdsException($error);
		    case 23:
		        return new VKApiErrorMethodDisabledException($error);
		    case 24:
		        return new VKApiErrorNeedConfirmationException($error);
		    case 25:
		        return new VKApiErrorNeedTokenConfirmationException($error);
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
		    case 113:
		        return new VKApiErrorParamUserIdException($error);
		    case 150:
		        return new VKApiErrorParamTimestampException($error);
		    case 200:
		        return new VKApiErrorAccessAlbumException($error);
		    case 201:
		        return new VKApiErrorAccessAudioException($error);
		    case 203:
		        return new VKApiErrorAccessGroupException($error);
		    case 300:
		        return new VKApiErrorAlbumFullException($error);
		    case 500:
		        return new VKApiErrorVotesPermissionException($error);
		    case 600:
		        return new VKApiErrorAdsPermissionException($error);
		    case 603:
		        return new VKApiErrorAdsSpecificException($error);
		    default:
		        return new VKApiException($error->getErrorCode(), $error->getErrorMsg(), $error);}
	}
}
