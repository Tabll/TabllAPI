<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('success')) {
    /**
     * 成功
     *
     * @param  array  $data
     * @param  int  $status
     *
     * @return JsonResponse
     */
    function success($data = [], $status = 200): JsonResponse
    {
        return response()->json([
            'data' => $data
        ], $status);
    }
}

if (!function_exists('fail')) {
    /**
     * 失败
     *
     * @param $message
     * @param  int  $status
     * @param  null  $error
     *
     * @return JsonResponse
     */
    function fail($message, $status = 403, $error = null): JsonResponse
    {
        $result = ['message' => $message];
        if (!is_null($error)) {
            $result['error'] = $error;
        }

        return response()->json($result, $status);
    }
}
