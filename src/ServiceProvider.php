<?php

namespace CentralBunk\Rate;

use CentralBunk\Rate\Services\BankRate;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider{

    public function register()
    {
        $this->app->singleton('BankRate', function () {
            return new BankRate();
        });
    }
}