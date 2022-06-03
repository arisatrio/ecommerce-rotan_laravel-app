<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $unreadMessages = Message::whereNull('read_at')->get();
        View::share('unreadMessages', $unreadMessages);
        // view()->composer('*', function ($view){
        //     $unreadMessages = Message::whereNull('read_at')->count();

        //     $view->with('unreadMessages');
        // });
    }
}
