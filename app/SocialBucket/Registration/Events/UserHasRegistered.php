<?php namespace SocialBucket\Registration\Events;
use SocialBucket\Users\User;
class UserHasRegistered {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }
}