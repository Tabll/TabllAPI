<?php

namespace App\Http\Controllers\Api\Tools;

use App\Http\Controllers\Controller;
use App\Models\Tools\OneWord;
use App\Resources\Tools\OneWordResource;
use DB;

class OneWordController extends Controller
{
    /**
     * @api 获取一言
     *
     * @return mixed
     */
    public function getOneWord()
    {
        $oneWord =OneWord::join(
                DB::raw("(SELECT ROUND(RAND() * ((SELECT MAX(id) FROM `one_words`) - (SELECT MIN(id) FROM `one_words`)) + (SELECT MIN(id) FROM `one_words`)) AS id) as temp"),
                'one_words.id', '>=', 'temp.id'
            )
            ->first();

        return new OneWordResource($oneWord);
    }
}
