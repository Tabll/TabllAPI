<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\HotNews\HotNewsCurrent as HotNewsCurrentModel;

class HotNewsCurrent extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = HotNewsCurrentModel::class;
}
