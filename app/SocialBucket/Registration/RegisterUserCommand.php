<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 12-04-2015
 * Time: 12:19
 */

namespace SocialBucket\Registration;


class RegisterUserCommand {

    public $username;

    public $email;

    public $password;

    function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


}