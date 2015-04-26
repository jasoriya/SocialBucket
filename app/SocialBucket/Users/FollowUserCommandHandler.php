<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 16-04-2015
 * Time: 17:22
 */

namespace SocialBucket\Users;

use Laracasts\Commander\CommandHandler;
class FollowUserCommandHandler implements CommandHandler {

protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /*
     * Handle the command
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->follow($command->userIdToFollow, $user);

        return $user;
    }

}