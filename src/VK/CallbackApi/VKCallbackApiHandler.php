<?php

namespace VK\CallbackApi;

abstract class VKCallbackApiHandler
{
	const AUDIO_NEW = 'audio_new';
	const BOARD_POST_NEW = 'board_post_new';
	const BOARD_POST_EDIT = 'board_post_edit';
	const BOARD_POST_RESTORE = 'board_post_restore';
	const BOARD_POST_DELETE = 'board_post_delete';
	const CONFIRMATION = 'confirmation';
	const GROUP_LEAVE = 'group_leave';
	const GROUP_JOIN = 'group_join';
	const GROUP_CHANGE_PHOTO = 'group_change_photo';
	const GROUP_CHANGE_SETTINGS = 'group_change_settings';
	const GROUP_OFFICERS_EDIT = 'group_officers_edit';
	const LEAD_FORMS_NEW = 'lead_forms_new';
	const MARKET_COMMENT_NEW = 'market_comment_new';
	const MARKET_COMMENT_DELETE = 'market_comment_delete';
	const MARKET_COMMENT_EDIT = 'market_comment_edit';
	const MARKET_COMMENT_RESTORE = 'market_comment_restore';
	const MARKET_ORDER_NEW = 'market_order_new';
	const MARKET_ORDER_EDIT = 'market_order_edit';
	const MESSAGE_NEW = 'message_new';
	const MESSAGE_REPLY = 'message_reply';
	const MESSAGE_EDIT = 'message_edit';
	const MESSAGE_ALLOW = 'message_allow';
	const MESSAGE_DENY = 'message_deny';
	const MESSAGE_READ = 'message_read';
	const MESSAGE_TYPING_STATE = 'message_typing_state';
	const MESSAGES_EDIT = 'messages_edit';
	const PHOTO_NEW = 'photo_new';
	const PHOTO_COMMENT_NEW = 'photo_comment_new';
	const PHOTO_COMMENT_DELETE = 'photo_comment_delete';
	const PHOTO_COMMENT_EDIT = 'photo_comment_edit';
	const PHOTO_COMMENT_RESTORE = 'photo_comment_restore';
	const POLL_VOTE_NEW = 'poll_vote_new';
	const USER_BLOCK = 'user_block';
	const USER_UNBLOCK = 'user_unblock';
	const VIDEO_NEW = 'video_new';
	const VIDEO_COMMENT_NEW = 'video_comment_new';
	const VIDEO_COMMENT_DELETE = 'video_comment_delete';
	const VIDEO_COMMENT_EDIT = 'video_comment_edit';
	const VIDEO_COMMENT_RESTORE = 'video_comment_restore';
	const WALL_POST_NEW = 'wall_post_new';
	const WALL_REPLY_NEW = 'wall_reply_new';
	const WALL_REPLY_EDIT = 'wall_reply_edit';
	const WALL_REPLY_DELETE = 'wall_reply_delete';
	const WALL_REPLY_RESTORE = 'wall_reply_restore';
	const WALL_REPOST = 'wall_repost';

	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function audioNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function boardPostNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function boardPostEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function boardPostRestore(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function boardPostDelete(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function confirmation(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function groupLeave(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function groupJoin(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function groupChangePhoto(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function groupChangeSettings(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function groupOfficersEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function leadFormsNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function marketCommentNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function marketCommentDelete(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function marketCommentEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function marketCommentRestore(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function marketOrderNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function marketOrderEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messageNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messageReply(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messageEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messageAllow(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messageDeny(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messageRead(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messageTypingState(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function messagesEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function photoNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function photoCommentNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function photoCommentDelete(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function photoCommentEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function photoCommentRestore(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function pollVoteNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function userBlock(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function userUnblock(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function videoNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function videoCommentNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function videoCommentDelete(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function videoCommentEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function videoCommentRestore(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function wallPostNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function wallReplyNew(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function wallReplyEdit(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function wallReplyDelete(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function wallReplyRestore(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param array $object
	 */
	public function wallRepost(int $group_id, ?string $secret, array $object)
	{
	}


	/**
	 * @param int $group_id
	 * @param string|null $secret
	 * @param string $type
	 * @param array $object
	 */
	public function parseObject(int $group_id, ?string $secret, string $type, array $object)
	{
		switch ($type) {
			case static::AUDIO_NEW:
				$this->audioNew($group_id, $secret, $object);
				break;
			case static::BOARD_POST_NEW:
				$this->boardPostNew($group_id, $secret, $object);
				break;
			case static::BOARD_POST_EDIT:
				$this->boardPostEdit($group_id, $secret, $object);
				break;
			case static::BOARD_POST_RESTORE:
				$this->boardPostRestore($group_id, $secret, $object);
				break;
			case static::BOARD_POST_DELETE:
				$this->boardPostDelete($group_id, $secret, $object);
				break;
			case static::CONFIRMATION:
				$this->confirmation($group_id, $secret, $object);
				break;
			case static::GROUP_LEAVE:
				$this->groupLeave($group_id, $secret, $object);
				break;
			case static::GROUP_JOIN:
				$this->groupJoin($group_id, $secret, $object);
				break;
			case static::GROUP_CHANGE_PHOTO:
				$this->groupChangePhoto($group_id, $secret, $object);
				break;
			case static::GROUP_CHANGE_SETTINGS:
				$this->groupChangeSettings($group_id, $secret, $object);
				break;
			case static::GROUP_OFFICERS_EDIT:
				$this->groupOfficersEdit($group_id, $secret, $object);
				break;
			case static::LEAD_FORMS_NEW:
				$this->leadFormsNew($group_id, $secret, $object);
				break;
			case static::MARKET_COMMENT_NEW:
				$this->marketCommentNew($group_id, $secret, $object);
				break;
			case static::MARKET_COMMENT_DELETE:
				$this->marketCommentDelete($group_id, $secret, $object);
				break;
			case static::MARKET_COMMENT_EDIT:
				$this->marketCommentEdit($group_id, $secret, $object);
				break;
			case static::MARKET_COMMENT_RESTORE:
				$this->marketCommentRestore($group_id, $secret, $object);
				break;
			case static::MARKET_ORDER_NEW:
				$this->marketOrderNew($group_id, $secret, $object);
				break;
			case static::MARKET_ORDER_EDIT:
				$this->marketOrderEdit($group_id, $secret, $object);
				break;
			case static::MESSAGE_NEW:
				$this->messageNew($group_id, $secret, $object);
				break;
			case static::MESSAGE_REPLY:
				$this->messageReply($group_id, $secret, $object);
				break;
			case static::MESSAGE_EDIT:
				$this->messageEdit($group_id, $secret, $object);
				break;
			case static::MESSAGE_ALLOW:
				$this->messageAllow($group_id, $secret, $object);
				break;
			case static::MESSAGE_DENY:
				$this->messageDeny($group_id, $secret, $object);
				break;
			case static::MESSAGE_READ:
				$this->messageRead($group_id, $secret, $object);
				break;
			case static::MESSAGE_TYPING_STATE:
				$this->messageTypingState($group_id, $secret, $object);
				break;
			case static::MESSAGES_EDIT:
				$this->messagesEdit($group_id, $secret, $object);
				break;
			case static::PHOTO_NEW:
				$this->photoNew($group_id, $secret, $object);
				break;
			case static::PHOTO_COMMENT_NEW:
				$this->photoCommentNew($group_id, $secret, $object);
				break;
			case static::PHOTO_COMMENT_DELETE:
				$this->photoCommentDelete($group_id, $secret, $object);
				break;
			case static::PHOTO_COMMENT_EDIT:
				$this->photoCommentEdit($group_id, $secret, $object);
				break;
			case static::PHOTO_COMMENT_RESTORE:
				$this->photoCommentRestore($group_id, $secret, $object);
				break;
			case static::POLL_VOTE_NEW:
				$this->pollVoteNew($group_id, $secret, $object);
				break;
			case static::USER_BLOCK:
				$this->userBlock($group_id, $secret, $object);
				break;
			case static::USER_UNBLOCK:
				$this->userUnblock($group_id, $secret, $object);
				break;
			case static::VIDEO_NEW:
				$this->videoNew($group_id, $secret, $object);
				break;
			case static::VIDEO_COMMENT_NEW:
				$this->videoCommentNew($group_id, $secret, $object);
				break;
			case static::VIDEO_COMMENT_DELETE:
				$this->videoCommentDelete($group_id, $secret, $object);
				break;
			case static::VIDEO_COMMENT_EDIT:
				$this->videoCommentEdit($group_id, $secret, $object);
				break;
			case static::VIDEO_COMMENT_RESTORE:
				$this->videoCommentRestore($group_id, $secret, $object);
				break;
			case static::WALL_POST_NEW:
				$this->wallPostNew($group_id, $secret, $object);
				break;
			case static::WALL_REPLY_NEW:
				$this->wallReplyNew($group_id, $secret, $object);
				break;
			case static::WALL_REPLY_EDIT:
				$this->wallReplyEdit($group_id, $secret, $object);
				break;
			case static::WALL_REPLY_DELETE:
				$this->wallReplyDelete($group_id, $secret, $object);
				break;
			case static::WALL_REPLY_RESTORE:
				$this->wallReplyRestore($group_id, $secret, $object);
				break;
			case static::WALL_REPOST:
				$this->wallRepost($group_id, $secret, $object);
				break;
		}
	}
}

