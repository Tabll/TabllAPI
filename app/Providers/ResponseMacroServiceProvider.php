<?php


namespace App\Providers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use App\Models\Tools\ResponseJson;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $responseFactory)
    {
        $responseFactory->macro('success', function ($messages = '') use ($responseFactory) {
            return $responseFactory->json(new ResponseJson($messages));
        });
        $responseFactory->macro('error', function () use ($responseFactory) {
            return $responseFactory->json(ResponseJson::create(1000, 'ERROR'));
        });
        $responseFactory->macro('abandon', function () use ($responseFactory) {
            return $responseFactory->json(ResponseJson::create(2000, 'ABANDONED'));
        });
    }
}
