<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\RumahType;
use App\Perumahan;
use App\RequirementDocument;
use App\Angsuran;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->runningInConsole()) {

            View::share('type_rumah', RumahType::all());

            View::share('perumahan_id', Perumahan::all());

            View::share('documents_new', RequirementDocument::whereApproved('false'));

            View::share('documents_approved', RequirementDocument::whereApproved('true'));

            View::share('angsuran_new',Angsuran::whereCompleted('false'));

            View::share('angsuran_completed',Angsuran::whereCompleted('true'));
        
        }
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
