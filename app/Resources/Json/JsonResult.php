<?php

namespace App\Resources\Json;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;

trait JsonResult
{
    /**
     * 资源集合
     *
     * @param  mixed  $resource
     *
     * @return AnonymousResourceCollection
     */
    public static function collection($resource)
    {
        return new AnonymousResourceCollection($resource, get_called_class());
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function toResponse($request)
    {
        return $this->resource instanceof AbstractPaginator ? (new PaginatedResourceResponse($this))->toResponse($request)
            : (new ResourceResponse($this))->toResponse($request);
    }
}
