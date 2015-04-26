<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 12-04-2015
 * Time: 12:30
 */

namespace SocialBucket\Registration;

use SocialBucket\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use SocialBucket\Users\User;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class RegisterUserCommandHandler
 * @package SocialBucket\Registration
 */
class RegisterUserCommandHandler implements CommandHandler{

    use DispatchableTrait;

    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the  command
     *
     * @param $command
     * @return mixed
     *
     */
    public function handle($command)
    {
        $user = User::register(
            $command->username, $command->email, $command->password
        );

        $this->repository->save($user);

        //Using the method DispatchableTrait

        $this->dispatchEventsFor($user);

        return $user;

    }
}