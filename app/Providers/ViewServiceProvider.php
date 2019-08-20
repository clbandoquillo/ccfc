<?php

namespace App\Providers;

use App\AttendanceTrack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('includes.nav', function ($view) {
            $approval_count  = $subjects = AttendanceTrack::where('teacher_id',Auth::id())->whereNull('approved')->count();
            $view->with(compact('approval_count'));
        });
    }
}
