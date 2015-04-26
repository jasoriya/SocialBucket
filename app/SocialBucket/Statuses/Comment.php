<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 17-04-2015
 * Time: 19:48
 */

namespace SocialBucket\Statuses;


class Comment extends \Eloquent{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'status_id', 'body'];
    /**
     * @param $body
     * @param $statusId
     * @return static
     */
    public static function leave($body, $statusId)
    {
        return new static([
            'body' => $body,
            'status_id' => $statusId
        ]);
    }
    /**
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo('SocialBucket\Users\User', 'user_id');
    }

}
