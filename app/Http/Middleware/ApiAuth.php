<?php

namespace App\Http\Middleware;

use App\Models\Common\ErrorCode;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{

    const API_KEY = "5nFZnnZl8n91lUBIw7p46I9SZtiWkoIlFM7pGI3qbbXA049feDAGd8jHF8JmY1Mw";
    const API_SECRET = "NrSjPIL1jGy55Ela3hLNQwFa6ZwCIHDkSSkAiMlh2Yfg8YZ3TD1yme9BgXeTu7Bk";

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('token') == self::API_KEY) {
            return $next($request);
        }

        return response()->error(ErrorCode::NO_AUTH, ErrorCode::NO_AUTH_MSG);
    }
}
