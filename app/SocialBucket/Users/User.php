<?php namespace SocialBucket\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use SocialBucket\Registration\Events\UserHasRegistered;
use Laracasts\Presenter\PresentableTrait;


class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

	/*
	 * Which fields may be mass assigned ?
	 *
	 * @var array
	 */
    protected $fillable =['username', 'email', 'password'];


    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * Path to the presenter for the User(Gravatar)
     * @var string
     */
    protected $presenter = 'SocialBucket\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    /*
     * Passwords must always be hashed.
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
       $this->attributes['password'] = Hash::make($password);

    }

    /*
     * a user has many statuses
     * @return mixed
     */
    public  function statuses()
    {
        return $this->hasMany('SocialBucket\Statuses\Status')->latest();
    }
    /*
     * Register a new user.
     *
     */
    public static function register($username, $email, $password ){
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserHasRegistered($user));


        return $user;

    }

    /**
     * Determine is the current user is same as the current one.
     *
     * @param User $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) return false;

        return $this->username == $user->username;
    }
    /**
     * Get the list of users that the current user follows.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followedUsers(){
        return $this->belongsToMany('SocialBucket\Users\User', 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    /**
     * Get the list of users who follow the current user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany('SocialBucket\Users\User', 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }

    /**
     * Determine if current user follows another user.
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser){
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

    public function comments()
    {
        return $this->hasMany('SocialBucket\Statuses\Comment');
    }


}
