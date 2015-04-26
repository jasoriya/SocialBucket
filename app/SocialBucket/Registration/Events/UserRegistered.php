<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 13-04-2015
 * Time: 17:26
 */

namespace SocialBucket\Registration\Events;

use SocialBucket\Users\User;
class UserRegistered {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

}