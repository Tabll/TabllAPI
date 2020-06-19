<?php

namespace App\Admin\Repositories;

use Dcat\Admin\Repositories\EloquentRepository;

class Calendar extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = \App\Models\Tools\Calendar::class;
}
