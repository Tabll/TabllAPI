<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Output\OutputInterface;

use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  Throwable  $exception
     *
     * @return void
     * @throws Exception
     */
    public function report(Throwable $exception)
    {
        // 报告异常给 Sentry
        if ($this->shouldReport($exception) && app()->bound('sentry')) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Throwable  $exception
     *
     * @return Mixed
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        // 表单验证失败
        if ($exception instanceof ValidationException) {
            $errors = $exception->errors();

            return fail($errors, 406, array_values($errors)[0][0]);
        }

        return parent::render($request, $exception);
    }

    /**
     * 控制台任务异常
     *
     * @param  OutputInterface  $output
     * @param  Throwable  $exception
     */
    public function renderForConsole($output, Throwable $exception)
    {
        parent::renderForConsole($output, $exception);
    }
}
