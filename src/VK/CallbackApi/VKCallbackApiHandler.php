<?php

namespace VK\CallbackApi;

abstract class VKCallbackApiHandler {
    protected const CALLBACK_EVENT_MESSAGE_NEW = 'message_new';
    protected const CALLBACK_EVENT_MESSAGE_REPLY = 'message_reply';
    protected const CALLBACK_EVENT_MESSAGE_ALLOW = 'message_allow';
    protected const CALLBACK_EVENT_MESSAGE_DENY = 'message_deny';
    protected const CALLBACK_EVENT_PHOTO_NEW = 'photo_new';
    protected const CALLBACK_EVENT_PHOTO_COMMENT_NEW = 'photo_comment_new';
    protected const CALLBACK_EVENT_PHOTO_COMMENT_EDIT = 'photo_comment_edit';
    protected const CALLBACK_EVENT_PHOTO_COMMENT_RESTORE = 'photo_comment_restore';
    protected const CALLBACK_EVENT_PHOTO_COMMENT_DELETE = 'photo_comment_delete';
    protected const CALLBACK_EVENT_AUDIO_NEW = 'audio_new';
    protected const CALLBACK_EVENT_VIDEO_NEW = 'video_new';
    protected const CALLBACK_EVENT_VIDEO_COMMENT_NEW = 'video_comment_new';
    protected const CALLBACK_EVENT_VIDEO_COMMENT_EDIT = 'video_comment_edit';
    protected const CALLBACK_EVENT_VIDEO_COMMENT_RESTORE = 'video_comment_restore';
    protected const CALLBACK_EVENT_VIDEO_COMMENT_DELETE = 'video_comment_delete';
    protected const CALLBACK_EVENT_WALL_POST_NEW = 'wall_post_new';
    protected const CALLBACK_EVENT_WALL_REPOST = 'wall_repost';
    protected const CALLBACK_EVENT_WALL_REPLY_NEW = 'wall_reply_new';
    protected const CALLBACK_EVENT_WALL_REPLY_EDIT = 'wall_reply_edit';
    protected const CALLBACK_EVENT_WALL_REPLY_RESTORE = 'wall_reply_restore';
    protected const CALLBACK_EVENT_WALL_REPLY_DELETE = 'wall_reply_delete';
    protected const CALLBACK_EVENT_BOARD_POST_NEW = 'board_post_new';
    protected const CALLBACK_EVENT_BOARD_POST_EDIT = 'board_post_edit';
    protected const CALLBACK_EVENT_BOARD_POST_RESTORE = 'board_post_restore';
    protected const CALLBACK_EVENT_BOARD_POST_DELETE = 'board_post_delete';
    protected const CALLBACK_EVENT_MARKET_COMMENT_NEW = 'market_comment_new';
    protected const CALLBACK_EVENT_MARKET_COMMENT_EDIT = 'market_comment_edit';
    protected const CALLBACK_EVENT_MARKET_COMMENT_RESTORE = 'market_comment_restore';
    protected const CALLBACK_EVENT_MARKET_COMMENT_DELETE = 'market_comment_delete';
    protected const CALLBACK_EVENT_GROUP_LEAVE = 'group_leave';
    protected const CALLBACK_EVENT_GROUP_JOIN = 'group_join';
    protected const CALLBACK_EVENT_GROUP_CHANGE_SETTINGS = 'group_change_settings';
    protected const CALLBACK_EVENT_GROUP_CHANGE_PHOTO = 'group_change_photo';
    protected const CALLBACK_EVENT_GROUP_OFFICERS_EDIT = 'group_officers_edit';
    protected const CALLBACK_EVENT_POLL_VOTE_NEW = 'poll_vote_new';
    protected const CALLBACK_EVENT_USER_BLOCK = 'user_block';
    protected const CALLBACK_EVENT_USER_UNBLOCK = 'user_unblock';

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function messageNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function messageReply(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function messageAllow(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function messageDeny(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function photoNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function photoCommentNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function photoCommentEdit(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function photoCommentRestore(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function photoCommentDelete(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function audioNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function videoNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function videoCommentNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function videoCommentEdit(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function videoCommentRestore(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function videoCommentDelete(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function wallPostNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function wallRepost(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function wallReplyNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function wallReplyEdit(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function wallReplyRestore(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function wallReplyDelete(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function boardPostNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function boardPostEdit(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function boardPostRestore(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function boardPostDelete(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function marketCommentNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function marketCommentEdit(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function marketCommentRestore(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function marketCommentDelete(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function groupLeave(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function groupJoin(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function groupChangeSettings(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function groupChangePhoto(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function groupOfficersEdit(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function pollVoteNew(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function userBlock(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param array $object
     */
    public function userUnblock(int $group_id, ?string $secret, array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param string $type
     * @param array $object
     */
    public function parseObject(int $group_id, ?string $secret, string $type, array $object) {
        switch ($type) {
            case static::CALLBACK_EVENT_MESSAGE_NEW:
                $this->messageNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_MESSAGE_REPLY:
                $this->messageReply($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_MESSAGE_ALLOW:
                $this->messageAllow($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_MESSAGE_DENY:
                $this->messageDeny($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_PHOTO_NEW:
                $this->photoNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_NEW:
                $this->photoCommentNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_EDIT:
                $this->photoCommentEdit($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_RESTORE:
                $this->photoCommentRestore($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_DELETE:
                $this->photoCommentDelete($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_AUDIO_NEW:
                $this->audioNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_VIDEO_NEW:
                $this->videoNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_NEW:
                $this->videoCommentNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_EDIT:
                $this->videoCommentEdit($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_RESTORE:
                $this->videoCommentRestore($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_DELETE:
                $this->videoCommentDelete($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_WALL_POST_NEW:
                $this->wallPostNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_WALL_REPOST:
                $this->wallRepost($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_NEW:
                $this->wallReplyNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_EDIT:
                $this->wallReplyEdit($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_RESTORE:
                $this->wallReplyRestore($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_DELETE:
                $this->wallReplyDelete($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_NEW:
                $this->boardPostNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_EDIT:
                $this->boardPostEdit($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_RESTORE:
                $this->boardPostRestore($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_DELETE:
                $this->boardPostDelete($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_NEW:
                $this->marketCommentNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_EDIT:
                $this->marketCommentEdit($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_RESTORE:
                $this->marketCommentRestore($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_DELETE:
                $this->marketCommentDelete($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_GROUP_LEAVE:
                $this->groupLeave($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_GROUP_JOIN:
                $this->groupJoin($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_GROUP_CHANGE_SETTINGS:
                $this->groupChangeSettings($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_GROUP_CHANGE_PHOTO:
                $this->groupChangePhoto($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_GROUP_OFFICERS_EDIT:
                $this->groupOfficersEdit($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_POLL_VOTE_NEW:
                $this->pollVoteNew($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_USER_BLOCK:
                $this->userBlock($group_id, $secret, $object);
                break;
            case static::CALLBACK_EVENT_USER_UNBLOCK:
                $this->userUnblock($group_id, $secret, $object);
                break;
        }
    }
}
