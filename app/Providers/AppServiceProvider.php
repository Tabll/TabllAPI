<?php

namespace App\Providers;

use App;
use App\Models\Common\ErrorCode;
use Exception;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use function Clue\StreamFilter\fun;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 注册应用程序服务
     *
     * @return void
     */
    public function register()
    {
        // 本地环境加载 IDE Helper
        if (App::environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
