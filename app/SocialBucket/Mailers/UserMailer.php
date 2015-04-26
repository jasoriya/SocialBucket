<?php namespace SocialBucket\Mailers;

use SocialBucket\Users\User;

class UserMailer extends Mailer {

    /**
     * @param User $user
     */
    public function sendWelcomeMessageTo(User $user)
    {
        $subject = 'Welcome to SocialBucket';
        $view = 'emails.registration.confirm';

        return $this->sendTo($user, $subject, $view);
    }
}
