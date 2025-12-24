<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {

        //#neosao disable debug bar in production mode
        if (!env('APP_DEBUG_TOOLBAR')) {
            \Debugbar::disable();
        }

        //#neosao force SSL rul's
        if (env('ENFORCE_SSL', false)) {
            $url->forceScheme('https');
        }

        //#neosao - use bootstrap css for paginator
        Paginator::useBootstrap();

        //#neosao
        $this->app->bind(Carbon::class, function (Container $container) {
            return new Carbon('now', 'Europe/Brussels');
        });

        Relation::morphMap([
            'estimate' => 'App\Models\Estimate',
            'proforma-invoice' => 'App\Models\ProformaInvoice',
            'customer_lead' => 'App\Models\CustomerLeads',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
