<?php

namespace App\Resources\Json;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AnonymousResourceCollection extends ResourceCollection
{
    use JsonResult;

    /**
     * 被收集的资源名称
     *
     * @var mixed
     */
    public $collects;

    /**
     * 匿名资源集合
     *
     * @param  mixed  $resource
     * @param  mixed  $collects
     *
     * @return void
     */
    public function __construct($resource, $collects)
    {
        $this->collects = $collects;

        parent::__construct($resource);
    }
}
