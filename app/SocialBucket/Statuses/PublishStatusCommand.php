<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 12-04-2015
 * Time: 12:19
 */

namespace SocialBucket\Statuses;


class PublishStatusCommand {

    public $body;
    public $userId;


    function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }


}