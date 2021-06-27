<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NhomThuoc;

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
        //
        view()->composer('pages.layouts.layout', function($view) {
            $nhomthuoc = NhomThuoc::all();
            $viewdata = [
                'nhomthuoc' => $nhomthuoc,
            ];
            $view->with($viewdata);
        });
        view()->composer('pages.layouts.page', function($view) {
            $nhomthuoc = NhomThuoc::all();
            $viewdata = [
                'nhomthuoc' => $nhomthuoc,
            ];
            $view->with($viewdata);
        });
    }
}
