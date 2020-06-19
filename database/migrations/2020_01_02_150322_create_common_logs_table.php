<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content')->nullable(false);
            $table->string('tags', 10)->nullable(true)->index();
            $table->tinyInteger('level')->nullable(false)->default(1)->index();
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
        Schema::dropIfExists('common_logs');
    }
}
