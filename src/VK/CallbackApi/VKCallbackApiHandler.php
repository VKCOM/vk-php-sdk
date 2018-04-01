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
     * @var int
     */
    protected $group_id;

    /**
     * @var string|null
     */
    protected $secret;

    /**
     * @param array $object
     */
    public function messageNew(array $object) {}

    /**
     * @param array $object
     */
    public function messageReply(array $object) {}

    /**
     * @param array $object
     */
    public function messageAllow(array $object) {}

    /**
     * @param array $object
     */
    public function messageDeny(array $object) {}

    /**
     * @param array $object
     */
    public function photoNew(array $object) {}

    /**
     * @param array $object
     */
    public function photoCommentNew(array $object) {}

    /**
     * @param array $object
     */
    public function photoCommentEdit(array $object) {}

    /**
     * @param array $object
     */
    public function photoCommentRestore(array $object) {}

    /**
     * @param array $object
     */
    public function photoCommentDelete(array $object) {}

    /**
     * @param array $object
     */
    public function audioNew(array $object) {}

    /**
     * @param array $object
     */
    public function videoNew(array $object) {}

    /**
     * @param array $object
     */
    public function videoCommentNew(array $object) {}

    /**
     * @param array $object
     */
    public function videoCommentEdit(array $object) {}

    /**
     * @param array $object
     */
    public function videoCommentRestore(array $object) {}

    /**
     * @param array $object
     */
    public function videoCommentDelete(array $object) {}

    /**
     * @param array $object
     */
    public function wallPostNew(array $object) {}

    /**
     * @param array $object
     */
    public function wallRepost(array $object) {}

    /**
     * @param array $object
     */
    public function wallReplyNew(array $object) {}

    /**
     * @param array $object
     */
    public function wallReplyEdit(array $object) {}

    /**
     * @param array $object
     */
    public function wallReplyRestore(array $object) {}

    /**
     * @param array $object
     */
    public function wallReplyDelete(array $object) {}

    /**
     * @param array $object
     */
    public function boardPostNew(array $object) {}

    /**
     * @param array $object
     */
    public function boardPostEdit(array $object) {}

    /**
     * @param array $object
     */
    public function boardPostRestore(array $object) {}

    /**
     * @param array $object
     */
    public function boardPostDelete(array $object) {}

    /**
     * @param array $object
     */
    public function marketCommentNew(array $object) {}

    /**
     * @param array $object
     */
    public function marketCommentEdit(array $object) {}

    /**
     * @param array $object
     */
    public function marketCommentRestore(array $object) {}

    /**
     * @param array $object
     */
    public function marketCommentDelete(array $object) {}

    /**
     * @param array $object
     */
    public function groupLeave(array $object) {}

    /**
     * @param array $object
     */
    public function groupJoin(array $object) {}

    /**
     * @param array $object
     */
    public function groupChangeSettings(array $object) {}

    /**
     * @param array $object
     */
    public function groupChangePhoto(array $object) {}

    /**
     * @param array $object
     */
    public function groupOfficersEdit(array $object) {}

    /**
     * @param array $object
     */
    public function pollVoteNew(array $object) {}

    /**
     * @param array $object
     */
    public function userBlock(array $object) {}

    /**
     * @param array $object
     */
    public function userUnblock(array $object) {}

    /**
     * @param int $group_id
     * @param null|string $secret
     * @param string $type
     * @param array $object
     */
    public function parseObject(int $group_id, ?string $secret, string $type, array $object) {
        $this->group_id = $group_id;
        $this->secret = $secret;

        switch ($type) {
            case static::CALLBACK_EVENT_MESSAGE_NEW:
                $this->messageNew($object);
                break;
            case static::CALLBACK_EVENT_MESSAGE_REPLY:
                $this->messageReply($object);
                break;
            case static::CALLBACK_EVENT_MESSAGE_ALLOW:
                $this->messageAllow($object);
                break;
            case static::CALLBACK_EVENT_MESSAGE_DENY:
                $this->messageDeny($object);
                break;
            case static::CALLBACK_EVENT_PHOTO_NEW:
                $this->photoNew($object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_NEW:
                $this->photoCommentNew($object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_EDIT:
                $this->photoCommentEdit($object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_RESTORE:
                $this->photoCommentRestore($object);
                break;
            case static::CALLBACK_EVENT_PHOTO_COMMENT_DELETE:
                $this->photoCommentDelete($object);
                break;
            case static::CALLBACK_EVENT_AUDIO_NEW:
                $this->audioNew($object);
                break;
            case static::CALLBACK_EVENT_VIDEO_NEW:
                $this->videoNew($object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_NEW:
                $this->videoCommentNew($object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_EDIT:
                $this->videoCommentEdit($object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_RESTORE:
                $this->videoCommentRestore($object);
                break;
            case static::CALLBACK_EVENT_VIDEO_COMMENT_DELETE:
                $this->videoCommentDelete($object);
                break;
            case static::CALLBACK_EVENT_WALL_POST_NEW:
                $this->wallPostNew($object);
                break;
            case static::CALLBACK_EVENT_WALL_REPOST:
                $this->wallRepost($object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_NEW:
                $this->wallReplyNew($object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_EDIT:
                $this->wallReplyEdit($object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_RESTORE:
                $this->wallReplyRestore($object);
                break;
            case static::CALLBACK_EVENT_WALL_REPLY_DELETE:
                $this->wallReplyDelete($object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_NEW:
                $this->boardPostNew($object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_EDIT:
                $this->boardPostEdit($object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_RESTORE:
                $this->boardPostRestore($object);
                break;
            case static::CALLBACK_EVENT_BOARD_POST_DELETE:
                $this->boardPostDelete($object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_NEW:
                $this->marketCommentNew($object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_EDIT:
                $this->marketCommentEdit($object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_RESTORE:
                $this->marketCommentRestore($object);
                break;
            case static::CALLBACK_EVENT_MARKET_COMMENT_DELETE:
                $this->marketCommentDelete($object);
                break;
            case static::CALLBACK_EVENT_GROUP_LEAVE:
                $this->groupLeave($object);
                break;
            case static::CALLBACK_EVENT_GROUP_JOIN:
                $this->groupJoin($object);
                break;
            case static::CALLBACK_EVENT_GROUP_CHANGE_SETTINGS:
                $this->groupChangeSettings($object);
                break;
            case static::CALLBACK_EVENT_GROUP_CHANGE_PHOTO:
                $this->groupChangePhoto($object);
                break;
            case static::CALLBACK_EVENT_GROUP_OFFICERS_EDIT:
                $this->groupOfficersEdit($object);
                break;
            case static::CALLBACK_EVENT_POLL_VOTE_NEW:
                $this->pollVoteNew($object);
                break;
            case static::CALLBACK_EVENT_USER_BLOCK:
                $this->userBlock($object);
                break;
            case static::CALLBACK_EVENT_USER_UNBLOCK:
                $this->userUnblock($object);
                break;
        }
    }
}
