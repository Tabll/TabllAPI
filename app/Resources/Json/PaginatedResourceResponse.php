<?php

namespace App\Resources\Json;

use App\Models\Tools\ResponseJson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PaginatedResourceResponse extends ResourceResponse
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function toResponse($request)
    {
        $wrap = $this->wrap(
            $this->resource->resolve($request),
            array_merge_recursive(
                $this->paginationInformation($request),
                $this->resource->with($request),
                $this->resource->additional
            )
        );
        $collection = [
            'code' => ResponseJson::RESPONSE_CODE,
            'message' => ResponseJson::RESPONSE_MESSAGE,
            'result' => $wrap,
        ];

        return tap(response()->json(
            $collection,
            $this->calculateStatus()
        ), function ($response) use ($request) {
            $this->resource->withResponse($request, $response);
        });
    }

    /**
     * Add the pagination information to the response.
     *
     * @param  Request  $request
     *
     * @return array
     */
    protected function paginationInformation($request)
    {
        $paginated = $this->resource->resource->toArray();

        return [
            'links' => $this->paginationLinks($paginated),
            'meta' => $this->meta($paginated),
        ];
    }

    /**
     * Get the pagination links for the response.
     *
     * @param  array  $paginated
     *
     * @return array
     */
    protected function paginationLinks($paginated)
    {
        return [
            'first' => $paginated['first_page_url'] ?? null,
            'last' => $paginated['last_page_url'] ?? null,
            'prev' => $paginated['prev_page_url'] ?? null,
            'next' => $paginated['next_page_url'] ?? null,
        ];
    }

    /**
     * Gather the meta data for the response.
     *
     * @param  array  $paginated
     *
     * @return array
     */
    protected function meta($paginated)
    {
        $paginated['from'] = $paginated['from'] ?? 0;
        $paginated['to'] = $paginated['to'] ?? 0;
        $paginated['per_page'] = intval($paginated['per_page']);

        return Arr::except($paginated, [
            'data',
            'first_page_url',
            'last_page_url',
            'prev_page_url',
            'next_page_url',
        ]);
    }
}
