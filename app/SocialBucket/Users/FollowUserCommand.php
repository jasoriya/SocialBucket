<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 16-04-2015
 * Time: 17:21
 */

namespace SocialBucket\Users;


class FollowUserCommand {

    public $userId;

    public $userIdToFollow;

    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }

}