<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
use App\Observers\ProjectObserver;
use App\Observers\ReviewObserver;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(125);

        Project::observe(ProjectObserver::class);
        Review::observe(ReviewObserver::class);
        User::observe(UserObserver::class);

//        Model::preventLazyLoading(true);

//        Paginator::useBootstrap();

        Paginator::defaultView('includes.primer-pagination');
        Paginator::defaultSimpleView('includes.primer-simple-pagination');

        // blade directives
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });

        Blade::directive('markdown', function ($expression) {
            return "<?php echo \Illuminate\Mail\Markdown::parse($expression); ?>";
        });

        if(Schema::hasTable('settings')) {
            // TODO: check if this is the best settings
            cache()->remember('settings', 24*60*60, function () {
                return Setting::all(['key','value'])
                    ->keyBy('key')
                    ->transform(function ($setting) {
                        return $setting->value;
                    })
                    ->toArray();
            });

            config([
                'global' => cache('settings'),
            ]);
        }

        // log user ip
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
    }
}
