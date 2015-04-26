<?php

namespace SocialBucket\Statuses;

use Laracasts\Presenter\PresentableTrait;
use SocialBucket\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
class Status extends \Eloquent {


    use EventGenerator, PresentableTrait;
    /*
     * fillable fields for a new status.
     */
    protected $fillable = ['body'];

    protected $presenter = 'SocialBucket\Statuses\StatusPresenter';

    /*
     * A status belongs to a user.
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
         return $this->belongsTo('SocialBucket\Users\User');
    }

    /**
     * Publish a new status.
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));


        return $status;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('SocialBucket\Statuses\Comment');
    }

}