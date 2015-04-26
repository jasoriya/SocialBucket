<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 16-04-2015
 * Time: 23:30
 */

namespace SocialBucket\Handlers;

use SocialBucket\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventListener;
use SocialBucket\Mailers\UserMailer;
class EmailNotifier extends EventListener{


    /**
     * @var UserMailer
     */
    private $mailer;
    /**
     * @param UserMailer $mailer
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param UserHasRegistered $event
     */
    public function whenUserHasRegistered(UserHasRegistered $event)
    {
       $this->mailer->sendWelcomeMessageTo($event->user);
    }

}