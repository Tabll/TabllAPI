<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\HotNews\HotNewsCurrentHour as HotNewsCurrentHourModel;

class HotNewsCurrentHour extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = HotNewsCurrentHourModel::class;
}
