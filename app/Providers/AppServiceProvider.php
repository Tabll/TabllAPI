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
        app('Dingo\Api\Exception\Handler')->register(function (ValidationException $validationException) {
            $message = $validationException->validator->getMessageBag();
            return response()->error(ErrorCode::ERROR_REQUEST, $message);
        });

        // 捕获 Dingo API 的错误
        app('Dingo\Api\Exception\Handler')->register(function (\Exception $exception) {

            // 其它错误
            if ($exception instanceof Exception) {
                if (App::environment('production')) {
                    return response()->error(ErrorCode::UN_NO_ERROR, ErrorCode::UN_NO_ERROR_MSG);
                }
            }
        });
    }
}
