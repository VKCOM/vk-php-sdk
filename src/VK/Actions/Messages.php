<?php
namespace VK\Actions;

use VK\Actions\Enums\MessagesFilter;
use VK\Actions\Enums\MessagesMediaType;
use VK\Actions\Enums\MessagesRev;
use VK\Client\VKApiRequest;
use VK\Exceptions\Api\VKApiLimitsException;
use VK\Exceptions\Api\VKApiMessagesCantChangeInviteLinkException;
use VK\Exceptions\Api\VKApiMessagesCantDeleteForAllException;
use VK\Exceptions\Api\VKApiMessagesCantFwdException;
use VK\Exceptions\Api\VKApiMessagesCantSeeInviteLinkException;
use VK\Exceptions\Api\VKApiMessagesChatBotFeatureException;
use VK\Exceptions\Api\VKApiMessagesChatNotAdminException;
use VK\Exceptions\Api\VKApiMessagesChatNotExistException;
use VK\Exceptions\Api\VKApiMessagesChatUserNotInChatException;
use VK\Exceptions\Api\VKApiMessagesChatUserNoAccessException;
use VK\Exceptions\Api\VKApiMessagesContactNotFoundException;
use VK\Exceptions\Api\VKApiMessagesDenySendException;
use VK\Exceptions\Api\VKApiMessagesEditExpiredException;
use VK\Exceptions\Api\VKApiMessagesEditKindDisallowedException;
use VK\Exceptions\Api\VKApiMessagesGroupPeerAccessException;
use VK\Exceptions\Api\VKApiMessagesKeyboardInvalidException;
use VK\Exceptions\Api\VKApiMessagesMessageRequestAlreadySentException;
use VK\Exceptions\Api\VKApiMessagesPrivacyException;
use VK\Exceptions\Api\VKApiMessagesTooBigException;
use VK\Exceptions\Api\VKApiMessagesTooLongForwardsException;
use VK\Exceptions\Api\VKApiMessagesTooLongMessageException;
use VK\Exceptions\Api\VKApiMessagesTooManyPostsException;
use VK\Exceptions\Api\VKApiMessagesTooNewPtsException;
use VK\Exceptions\Api\VKApiMessagesTooOldPtsException;
use VK\Exceptions\Api\VKApiMessagesUserBlockedException;
use VK\Exceptions\Api\VKApiPhotoChangedException;
use VK\Exceptions\Api\VKApiUploadException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

/**
 */
class Messages {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Messages constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Adds a new user to a chat.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer chat_id: Chat ID.
	 * - @var integer user_id: ID of the user to be added to the chat.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiLimitsException Out of limits
	 * @throws VKApiMessagesChatNotAdminException You are not admin of this chat
	 * @throws VKApiMessagesMessageRequestAlreadySentException Message request already sent
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @return mixed
	 */
	public function addChatUser($access_token, array $params = []) {
		return $this->request->post('messages.addChatUser', $access_token, $params);
	}

	/**
	 * Allows sending messages from community to the current user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Group ID.
	 * - @var string key
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function allowMessagesFromGroup($access_token, array $params = []) {
		return $this->request->post('messages.allowMessagesFromGroup', $access_token, $params);
	}

	/**
	 * Creates a chat with several participants.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] user_ids: IDs of the users to be added to the chat.
	 * - @var string title: Chat title.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @return mixed
	 */
	public function createChat($access_token, array $params = []) {
		return $this->request->post('messages.createChat', $access_token, $params);
	}

	/**
	 * Deletes one or more messages.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] message_ids: Message IDs.
	 * - @var boolean spam: '1' — to mark message as spam.
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * - @var boolean delete_for_all: '1' — delete message for for all.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesCantDeleteForAllException Can't delete this message for everybody
	 * @return mixed
	 */
	public function delete($access_token, array $params = []) {
		return $this->request->post('messages.delete', $access_token, $params);
	}

	/**
	 * Deletes a chat's cover picture.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer chat_id: Chat ID.
	 * - @var integer group_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatNotAdminException You are not admin of this chat
	 * @return mixed
	 */
	public function deleteChatPhoto($access_token, array $params = []) {
		return $this->request->post('messages.deleteChatPhoto', $access_token, $params);
	}

	/**
	 * Deletes all private messages in a conversation.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID. To clear a chat history use 'chat_id'
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @return mixed
	 */
	public function deleteConversation($access_token, array $params = []) {
		return $this->request->post('messages.deleteConversation', $access_token, $params);
	}

	/**
	 * Denies sending message from community to the current user.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Group ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function denyMessagesFromGroup($access_token, array $params = []) {
		return $this->request->post('messages.denyMessagesFromGroup', $access_token, $params);
	}

	/**
	 * Edits the message.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var string message: (Required if 'attachments' is not set.) Text of the message.
	 * - @var integer message_id
	 * - @var number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
	 * - @var number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
	 * - @var string attachment: (Required if 'message' is not set.) List of objects attached to the message, separated by commas, in the following format: "<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'wall' — wall post, '<owner_id>' — ID of the media attachment owner. '<media_id>' — media attachment ID. Example: "photo100172_166443618"
	 * - @var boolean keep_forward_messages: '1' — to keep forwarded, messages.
	 * - @var boolean keep_snippets: '1' — to keep attached snippets.
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * - @var boolean dont_parse_links
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesDenySendException Can't send messages for users without permission
	 * @throws VKApiMessagesEditExpiredException Can't edit this message, because it's too old
	 * @throws VKApiMessagesTooBigException Can't sent this message, because it's too big
	 * @throws VKApiMessagesEditKindDisallowedException Can't edit this kind of message
	 * @throws VKApiMessagesTooLongMessageException Message is too long
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @throws VKApiMessagesKeyboardInvalidException Keyboard format is invalid
	 * @return mixed
	 */
	public function edit($access_token, array $params = []) {
		return $this->request->post('messages.edit', $access_token, $params);
	}

	/**
	 * Edits the title of a chat.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer chat_id: Chat ID.
	 * - @var string title: New title of the chat.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatNotAdminException You are not admin of this chat
	 * @return mixed
	 */
	public function editChat($access_token, array $params = []) {
		return $this->request->post('messages.editChat', $access_token, $params);
	}

	/**
	 * Returns messages by their IDs within the conversation.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var array[integer] conversation_message_ids: Conversation message IDs.
	 * - @var boolean extended: Information whether the response should be extended
	 * - @var array[MessagesFields] fields: Profile fields to return.
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getByConversationMessageId($access_token, array $params = []) {
		return $this->request->post('messages.getByConversationMessageId', $access_token, $params);
	}

	/**
	 * Returns messages by their IDs.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] message_ids: Message IDs.
	 * - @var integer preview_length: Number of characters after which to truncate a previewed message. To preview the full message, specify '0'. "NOTE: Messages are not truncated by default. Messages are truncated by words."
	 * - @var boolean extended: Information whether the response should be extended
	 * - @var array[MessagesFields] fields: Profile fields to return.
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getById($access_token, array $params = []) {
		return $this->request->post('messages.getById', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id
	 * - @var string link: Invitation link.
	 * - @var array[MessagesFields] fields: Profile fields to return.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @return mixed
	 */
	public function getChatPreview($access_token, array $params = []) {
		return $this->request->post('messages.getChatPreview', $access_token, $params);
	}

	/**
	 * Returns a list of IDs of users participating in a chat.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: Peer ID.
	 * - @var array[MessagesFields] fields: Profile fields to return.
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @return mixed
	 */
	public function getConversationMembers($access_token, array $params = []) {
		return $this->request->post('messages.getConversationMembers', $access_token, $params);
	}

	/**
	 * Returns a list of the current user's conversations.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of conversations.
	 * - @var integer count: Number of conversations to return.
	 * - @var MessagesFilter filter: Filter to apply: 'all' — all conversations, 'unread' — conversations with unread messages, 'important' — conversations, marked as important (only for community messages), 'unanswered' — conversations, marked as unanswered (only for community messages)
	 * - @var boolean extended: '1' — return extra information about users and communities
	 * - @var integer start_message_id: ID of the message from what to return dialogs.
	 * - @var array[MessagesFields] fields: Profile and communities fields to return.
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @return mixed
	 */
	public function getConversations($access_token, array $params = []) {
		return $this->request->post('messages.getConversations', $access_token, $params);
	}

	/**
	 * Returns conversations by their IDs
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] peer_ids: Destination IDs. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var boolean extended: Return extended properties
	 * - @var array[MessagesFields] fields: Profile and communities fields to return.
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatNotExistException Chat does not exist
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @return mixed
	 */
	public function getConversationsById($access_token, array $params = []) {
		return $this->request->post('messages.getConversationsById', $access_token, $params);
	}

	/**
	 * Returns message history for the specified user or group chat.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer offset: Offset needed to return a specific subset of messages.
	 * - @var integer count: Number of messages to return.
	 * - @var integer user_id: ID of the user whose message history you want to return.
	 * - @var integer peer_id
	 * - @var integer start_message_id: Starting message ID from which to return history.
	 * - @var MessagesRev rev: Sort order: '1' — return messages in chronological order. '0' — return messages in reverse chronological order.
	 * - @var boolean extended: Information whether the response should be extended
	 * - @var array[MessagesFields] fields: Profile fields to return.
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @return mixed
	 */
	public function getHistory($access_token, array $params = []) {
		return $this->request->post('messages.getHistory', $access_token, $params);
	}

	/**
	 * Returns media files from the dialog or group chat.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: Peer ID. ", For group chat: '2000000000 + chat ID' , , For community: '-community ID'"
	 * - @var MessagesMediaType media_type: Type of media files to return: *'photo',, *'video',, *'audio',, *'doc',, *'link'.,*'market'.,*'wall'.,*'share'
	 * - @var string start_from: Message ID to start return results from.
	 * - @var integer count: Number of objects to return.
	 * - @var boolean photo_sizes: '1' — to return photo sizes in a
	 * - @var array[MessagesFields] fields: Additional profile [vk.com/dev/fields|fields] to return. 
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * - @var boolean preserve_order
	 * - @var integer max_forwards_level
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getHistoryAttachments($access_token, array $params = []) {
		return $this->request->post('messages.getHistoryAttachments', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: Destination ID.
	 * - @var boolean reset: 1 — to generate new link (revoke previous), 0 — to return previous link.
	 * - @var integer group_id: Group ID
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesCantSeeInviteLinkException You can't see invite link for this chat
	 * @throws VKApiMessagesCantChangeInviteLinkException You can't change invite link for this chat
	 * @return mixed
	 */
	public function getInviteLink($access_token, array $params = []) {
		return $this->request->post('messages.getInviteLink', $access_token, $params);
	}

	/**
	 * Returns a user's current status and date of last activity.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getLastActivity($access_token, array $params = []) {
		return $this->request->post('messages.getLastActivity', $access_token, $params);
	}

	/**
	 * Returns updates in user's private messages.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer ts: Last value of the 'ts' parameter returned from the Long Poll server or by using [vk.com/dev/messages.getLongPollHistory|messages.getLongPollHistory] method.
	 * - @var integer pts: Lsat value of 'pts' parameter returned from the Long Poll server or by using [vk.com/dev/messages.getLongPollHistory|messages.getLongPollHistory] method.
	 * - @var integer preview_length: Number of characters after which to truncate a previewed message. To preview the full message, specify '0'. "NOTE: Messages are not truncated by default. Messages are truncated by words."
	 * - @var boolean onlines: '1' — to return history with online users only.
	 * - @var array[MessagesFields] fields: Additional profile [vk.com/dev/fields|fields] to return.
	 * - @var integer events_limit: Maximum number of events to return.
	 * - @var integer msgs_limit: Maximum number of messages to return.
	 * - @var integer max_msg_id: Maximum ID of the message among existing ones in the local copy. Both messages received with API methods (for example, , ), and data received from a Long Poll server (events with code 4) are taken into account.
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * - @var integer lp_version
	 * - @var integer last_n
	 * - @var boolean credentials
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesTooOldPtsException Value of ts or pts is too old
	 * @throws VKApiMessagesTooNewPtsException Value of ts or pts is too new
	 * @return mixed
	 */
	public function getLongPollHistory($access_token, array $params = []) {
		return $this->request->post('messages.getLongPollHistory', $access_token, $params);
	}

	/**
	 * Returns data required for connection to a Long Poll server.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var boolean need_pts: '1' — to return the 'pts' field, needed for the [vk.com/dev/messages.getLongPollHistory|messages.getLongPollHistory] method.
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * - @var integer lp_version: Long poll version
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getLongPollServer($access_token, array $params = []) {
		return $this->request->post('messages.getLongPollServer', $access_token, $params);
	}

	/**
	 * Returns information whether sending messages from the community to current user is allowed.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer group_id: Group ID.
	 * - @var integer user_id: User ID.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function isMessagesFromGroupAllowed($access_token, array $params = []) {
		return $this->request->post('messages.isMessagesFromGroupAllowed', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var string link: Invitation link.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @throws VKApiLimitsException Out of limits
	 * @return mixed
	 */
	public function joinChatByInviteLink($access_token, array $params = []) {
		return $this->request->post('messages.joinChatByInviteLink', $access_token, $params);
	}

	/**
	 * Marks and unmarks conversations as unanswered.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: ID of conversation to mark as important.
	 * - @var boolean answered: '1' — to mark as answered, '0' — to remove the mark
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function markAsAnsweredConversation($access_token, array $params = []) {
		return $this->request->post('messages.markAsAnsweredConversation', $access_token, $params);
	}

	/**
	 * Marks and unmarks messages as important (starred).
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] message_ids: IDs of messages to mark as important.
	 * - @var integer important: '1' — to add a star (mark as important), '0' — to remove the star
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function markAsImportant($access_token, array $params = []) {
		return $this->request->post('messages.markAsImportant', $access_token, $params);
	}

	/**
	 * Marks and unmarks conversations as important.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: ID of conversation to mark as important.
	 * - @var boolean important: '1' — to add a star (mark as important), '0' — to remove the star
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function markAsImportantConversation($access_token, array $params = []) {
		return $this->request->post('messages.markAsImportantConversation', $access_token, $params);
	}

	/**
	 * Marks messages as read.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var array[integer] message_ids: IDs of messages to mark as read.
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var integer start_message_id: Message ID to start from.
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function markAsRead($access_token, array $params = []) {
		return $this->request->post('messages.markAsRead', $access_token, $params);
	}

	/**
	 * Pin a message.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'Chat ID', e.g. '2000000001'. For community: '- Community ID', e.g. '-12345'. "
	 * - @var integer message_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatNotAdminException You are not admin of this chat
	 * @return mixed
	 */
	public function pin($access_token, array $params = []) {
		return $this->request->post('messages.pin', $access_token, $params);
	}

	/**
	 * Allows the current user to leave a chat or, if the current user started the chat, allows the user to remove another user from the chat.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer chat_id: Chat ID.
	 * - @var integer user_id: ID of the user to be removed from the chat.
	 * - @var integer member_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatNotAdminException You are not admin of this chat
	 * @throws VKApiMessagesChatUserNotInChatException User not found in chat
	 * @return mixed
	 */
	public function removeChatUser($access_token, array $params = []) {
		return $this->request->post('messages.removeChatUser', $access_token, $params);
	}

	/**
	 * Restores a deleted message.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer message_id: ID of a previously-deleted message to restore.
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function restore($access_token, array $params = []) {
		return $this->request->post('messages.restore', $access_token, $params);
	}

	/**
	 * Returns a list of the current user's private messages that match search criteria.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string q: Search query string.
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var integer date: Date to search message before in Unixtime.
	 * - @var integer preview_length: Number of characters after which to truncate a previewed message. To preview the full message, specify '0'. "NOTE: Messages are not truncated by default. Messages are truncated by words."
	 * - @var integer offset: Offset needed to return a specific subset of messages.
	 * - @var integer count: Number of messages to return.
	 * - @var boolean extended
	 * - @var array[string] fields
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function search($access_token, array $params = []) {
		return $this->request->post('messages.search', $access_token, $params);
	}

	/**
	 * Returns a list of the current user's conversations that match search criteria.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string q: Search query string.
	 * - @var integer count: Maximum number of results.
	 * - @var boolean extended: '1' — return extra information about users and communities
	 * - @var array[MessagesFields] fields: Profile fields to return.
	 * - @var integer group_id: Group ID (for group messages with user access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function searchConversations($access_token, array $params = []) {
		return $this->request->post('messages.searchConversations', $access_token, $params);
	}

	/**
	 * Sends a message.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID (by default — current user).
	 * - @var integer random_id: Unique identifier to avoid resending the message.
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var string domain: User's short address (for example, 'illarionov').
	 * - @var integer chat_id: ID of conversation the message will relate to.
	 * - @var array[integer] user_ids: IDs of message recipients (if new conversation shall be started).
	 * - @var string message: (Required if 'attachments' is not set.) Text of the message.
	 * - @var number lat: Geographical latitude of a check-in, in degrees (from -90 to 90).
	 * - @var number long: Geographical longitude of a check-in, in degrees (from -180 to 180).
	 * - @var string attachment: (Required if 'message' is not set.) List of objects attached to the message, separated by commas, in the following format: "<owner_id>_<media_id>", '' — Type of media attachment: 'photo' — photo, 'video' — video, 'audio' — audio, 'doc' — document, 'wall' — wall post, '<owner_id>' — ID of the media attachment owner. '<media_id>' — media attachment ID. Example: "photo100172_166443618"
	 * - @var integer reply_to
	 * - @var string forward_messages: ID of forwarded messages, separated with a comma. Listed messages of the sender will be shown in the message body at the recipient's. Example: "123,431,544"
	 * - @var integer sticker_id: Sticker id.
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * - @var string keyboard
	 * - @var string payload
	 * - @var boolean dont_parse_links
	 * - @var boolean disable_mentions
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesUserBlockedException Can't send messages for users from blacklist
	 * @throws VKApiMessagesDenySendException Can't send messages for users without permission
	 * @throws VKApiMessagesPrivacyException Can't send messages to this user due to their privacy settings
	 * @throws VKApiMessagesTooLongMessageException Message is too long
	 * @throws VKApiMessagesTooLongForwardsException Too many forwarded messages
	 * @throws VKApiMessagesCantFwdException Can't forward these messages
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @throws VKApiMessagesKeyboardInvalidException Keyboard format is invalid
	 * @throws VKApiMessagesChatBotFeatureException This is a chat bot feature, change this status in settings
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @throws VKApiMessagesTooManyPostsException Too many posts in messages
	 * @return mixed
	 */
	public function send($access_token, array $params = []) {
		return $this->request->post('messages.send', $access_token, $params);
	}

	/**
	 * Changes the status of a user as typing in a conversation.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer user_id: User ID.
	 * - @var string type: 'typing' — user has started to type.
	 * - @var integer peer_id: Destination ID. "For user: 'User ID', e.g. '12345'. For chat: '2000000000' + 'chat_id', e.g. '2000000001'. For community: '- community ID', e.g. '-12345'. "
	 * - @var integer group_id: Group ID (for group messages with group access token)
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesGroupPeerAccessException Your community can't interact with this peer
	 * @throws VKApiMessagesChatUserNoAccessException You don't have access to this chat
	 * @throws VKApiMessagesContactNotFoundException Contact not found
	 * @return mixed
	 */
	public function setActivity($access_token, array $params = []) {
		return $this->request->post('messages.setActivity', $access_token, $params);
	}

	/**
	 * Sets a previously-uploaded picture as the cover picture of a chat.
	 *
	 * @param string $access_token
	 * @param array $params 
	 * - @var string file: Upload URL from the 'response' field returned by the [vk.com/dev/photos.getChatUploadServer|photos.getChatUploadServer] method upon successfully uploading an image.
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiUploadException Upload error
	 * @throws VKApiPhotoChangedException Original photo was changed
	 * @throws VKApiMessagesChatNotAdminException You are not admin of this chat
	 * @return mixed
	 */
	public function setChatPhoto($access_token, array $params = []) {
		return $this->request->post('messages.setChatPhoto', $access_token, $params);
	}

	/**
	 * @param string $access_token
	 * @param array $params 
	 * - @var integer peer_id
	 * - @var integer group_id
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiMessagesChatNotAdminException You are not admin of this chat
	 * @return mixed
	 */
	public function unpin($access_token, array $params = []) {
		return $this->request->post('messages.unpin', $access_token, $params);
	}
}
