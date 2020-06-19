<?php

namespace App\Models\Tools;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class OneWord extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'one_words';
}
