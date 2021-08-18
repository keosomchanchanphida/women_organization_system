<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\ActivityImage;
use App\Models\File;
use App\Observers\ActivityImageObserver;
use App\Observers\ActivityObserver;
use App\Observers\FileObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Activity::observe(ActivityObserver::class);
        ActivityImage::observe(ActivityImageObserver::class);
        File::observe(FileObserver::class);
    }
}
