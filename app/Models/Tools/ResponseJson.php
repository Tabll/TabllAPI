<?php


namespace App\Models\Tools;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResponseJson implements Responsable
{
    const RESPONSE_CODE = 1;
    const RESPONSE_MESSAGE = 'success';

    public $code = self::RESPONSE_CODE;
    public $message = self::RESPONSE_MESSAGE;
    public $result = null;

    public function __construct(
        $responseContent = "",
        $responseCode = self::RESPONSE_CODE,
        $responseMessage = self::RESPONSE_MESSAGE
    ) {
        $this->code = $responseCode;
        $this->message = $responseMessage;
        $this->result = $responseContent;
    }

    public static function create($responseCode, $responseMessage, $responseContent = '')
    {
        return new static($responseContent, $responseCode, $responseMessage);
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param Request $request
     *
     * @return Mixed
     */
    public function toResponse($request)
    {
        return tap(response()->json($this, 200), function ($response) use ($request) {
            $this->withResponse($request, $response);
        });
    }


    /**
     * Customize the response for a request.
     *
     * @param Request $request
     * @param JsonResponse $response
     *
     * @return void
     */
    public function withResponse($request, $response)
    {
        //
    }
}
