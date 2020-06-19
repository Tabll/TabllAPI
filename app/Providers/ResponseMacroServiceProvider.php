<?php
/* @noinspection PhpUndefinedMethodInspection */

namespace App\Providers;

use App\Models\Common\ErrorCode;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use App\Models\Tools\ResponseJson;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * 注册 ResponseFactory
     *
     * @param  ResponseFactory  $responseFactory
     */
    public function boot(ResponseFactory $responseFactory)
    {
        // 成功请求
        $responseFactory->macro('success', function ($messages = '') use ($responseFactory) {
            return $responseFactory->json(new ResponseJson($messages));
        });

        // 错误请求
        $responseFactory->macro('error', function ($errorCode, $errorMessage) use ($responseFactory) {
            return $responseFactory->json(ResponseJson::create($errorCode, $errorMessage));
        });

        // 接口废弃
        $responseFactory->macro('abandon', function () use ($responseFactory) {
            return $responseFactory->json(ResponseJson::create(ErrorCode::ABANDONED, ErrorCode::ABANDONED_MSG));
        });
    }
}
