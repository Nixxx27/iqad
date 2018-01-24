<?php

namespace App\Providers;

use  \Carbon\Carbon;
use App\findings;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('year_now', Carbon::parse()->year);
        });

        /**
         * General Declaration
         * @return Global variables
         */
        $date = carbon::parse()->format('Y-m-d');
        view()->share(
            array(
                "dev_name"          =>"Nikko Zabala",
                "system_name"       =>"IQAD System",
                "company_name"      =>"SkyLogistics Philippines Inc.",
                "dev_email"          =>"nikko.zabala@gmail.com",
                "year_now_last_2"   => substr(Carbon::parse()->year, -2),
                "date_now"          => Carbon::now(),
                "warning_hand"      =>"<img src='http://localhost:8080/QADapps/public/images/warning-hand.png' height='20px' title='required'>",
                "overdue_count"     => findings::where('finding_due', '<',$date)->where('finding_alert','=','yes')->count(), //view overdue findings
                "moderate_count"     => findings::where('finding_due', '<',$date)->where('finding_alert','=','yes')->count(), //view overdue findings
                "all_findings"      => findings::all()->count() //view all findings
                )
            );
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
