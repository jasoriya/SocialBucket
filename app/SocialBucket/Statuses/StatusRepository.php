<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 14-04-2015
 * Time: 02:20
 */

namespace SocialBucket\Statuses;

use SocialBucket\Users\User;
class StatusRepository {

    public function getAllForUser(User $user)
    {
        return $user->statuses()->with('user')->latest()->get();
    }

    /**
     * Save a new status for a user.
     *
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)
            ->statuses()
            ->save($status);
    }

    /**
     * Get the feed for the User.
     * @param User $user
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getFeedForUser(User $user){

        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }

    public function leaveComment($userId, $statusId, $body)
    {
        $comment = Comment::leave($body, $statusId);

        User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }

}