<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_words', function (Blueprint $table) {
            $table->id();
            $table->string('word', 300)->nullable(false)->comment('一言');
            $table->string('from', 20)->nullable(true)->comment('作者');
            $table->tinyInteger('type')->nullable(false)->default(1)->comment('类型');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('one_words');
    }
}
