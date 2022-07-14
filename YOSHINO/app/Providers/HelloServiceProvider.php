<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
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
        View::composer (
            'hello.index', function($view) {
                // $view: Illuminate\View名前空間にあるViewクラスのインスタンス
                // with: ビューに変数などを追加するためのもの
                $view->with('view_message', 'composer message!');
            }
        );
    
    }
}
