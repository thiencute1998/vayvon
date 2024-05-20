<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Config;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        Paginator::useBootstrap();
//        $bannerApp = Banner::where('status', 1)->first();
//        // Logo
//        $logoWebsite = Banner::where('status', 1)->where('type', 5)->first();
//        $contactFooter = About::first();
//        //Config
        $config = Config::first();
        $menuProducts = Product::where('status', 1)->where('type', 2)->get();
//        $links = Link::where('status',1)->orderBy('created_at', 'asc')->get();
//        $categories = Category::where('status', 1)->where('level', 1)->orderBy('order', 'asc')->get();
//        // Lien he
        $contactWebsite = About::first();
        View::composer('*', function ($view) use($config, $menuProducts, $contactWebsite){
            $adminLogin = Auth::user();
            $data = [
                'adminLogin'=> $adminLogin,
                'config'=> $config,
                'menuProducts'=> $menuProducts,
                'contactWebsite'=> $contactWebsite
            ];
            $view->with($data);
        });
    }
}
