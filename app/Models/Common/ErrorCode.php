<?php

namespace App\Models\Common;

class ErrorCode
{
    /*
     |
     | 全局通用错误码
     |
     */
    const UN_NO_ERROR = -100;
    const UN_NO_ERROR_MSG = '服务器发生未知错误';

    const NO_AUTH = -200;
    const NO_AUTH_MSG = '无权限访问';

    const TOKEN_ERROR = -210;
    const TOKEN_ERROR_MSG = '凭据无效';

    const NO_RESOURCE = -300;
    const NO_RESOURCE_MSG = '无效的资源';

    const ERROR_REQUEST = -400;
    const ERROR_REQUEST_MSG = '错误的请求数据';

    const ABANDONED = -500;
    const ABANDONED_MSG = '此接口已被废弃';
}
