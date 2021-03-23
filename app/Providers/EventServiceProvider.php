<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CompanyDetail;
use App\Models\CompanyList;
use App\Models\Project;
use App\Models\ProjectContent;
use App\Models\Slide;
use App\Observers\CategoryObserver;
use App\Observers\CompanyDetailObserver;
use App\Observers\CompanyListObserver;
use App\Observers\ProjectContentObserver;
use App\Observers\ProjectObserver;
use App\Observers\SlideObserver;
use App\Observers\SliderObserver;
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
        CompanyDetail::observe(CompanyDetailObserver::class);
        CompanyList::observe(CompanyListObserver::class);
    }
}
