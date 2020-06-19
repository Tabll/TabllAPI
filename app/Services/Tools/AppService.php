<?php

namespace App\Services\Tools;

use App;

class AppService
{
    /**
     * 获取当前的环境名称
     *
     * @return string
     */
    public function getEnvName()
    {
        $envNames = [
            'local' => '本地环境',
            'integration' => '集成环境',
            'testing' => '测试环境',
            'staging' => '预演环境',
            'production' => '生产环境',
        ];

        return $envNames[App::environment()] ?? App::environment();
    }
}
