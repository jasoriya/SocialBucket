<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 17-04-2015
 * Time: 17:26
 */

namespace SocialBucket\Providers;

use Illuminate\Support\ServiceProvider;
class EventServiceProvider extends ServiceProvider{

    /**
     *Register SocialBucket event listeners.
     */
    public function register()
    {
        $this->app['events']->listen('SocialBucket.*', 'SocialBucket\Handlers\EmailNotifier');
    }

}