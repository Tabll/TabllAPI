<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;
use App\Models\HotNews\HotNewsHistory as HotNewsHistoryModel;

class HotNewsHistory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = HotNewsHistoryModel::class;
}
