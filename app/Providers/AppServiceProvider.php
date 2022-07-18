<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Models\Message;
use App\Models\Settings;
use App\Models\Order;

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
        $website        = Settings::first();
        $newOrder       = Order::where('status', 'new')->get()->count();

        View::share([
            'unreadMessages' => $unreadMessages, 
            'website'=> $website,
            'newOrder'  => $newOrder,
        ]);
    }
}
