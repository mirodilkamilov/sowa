<?php

namespace App\Providers;

use App\Models\About;
use App\Models\AboutList;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectContent;
use App\Models\Slide;
use App\Observers\AboutListObserver;
use App\Observers\AboutObserver;
use App\Observers\CategoryObserver;
use App\Observers\ProjectContentObserver;
use App\Observers\ProjectObserver;
use App\Observers\SlideObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        Slide::observe(SlideObserver::class);
        Project::observe(ProjectObserver::class);
        ProjectContent::observe(ProjectContentObserver::class);
        Category::observe(CategoryObserver::class);
        About::observe(AboutObserver::class);
        AboutList::observe(AboutListObserver::class);
    }
}
