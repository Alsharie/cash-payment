<?php

namespace Alsharie\CashPayPayment;

use Illuminate\Support\ServiceProvider;

class  CashPayServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Config file
        $this->publishes([
            __DIR__ . '/../config/cashPay.php' => config_path('cashPay.php'),
        ]);

        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/cashPay.php', 'CashPay');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CashPay::class, function () {
            return new CashPay();
        });
    }
}