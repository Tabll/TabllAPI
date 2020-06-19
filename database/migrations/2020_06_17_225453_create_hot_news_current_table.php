<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotNewsCurrentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_news_current', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rank')->default(1)->comment('排名');
            $table->string('content', 500)->comment('内容');
            $table->string('source', 5)->default('u')->comment('来源');
            $table->integer('heat')->nullable()->comment('热度');
            $table->string('uuid', 20)->nullable()->comment('标识 ID');
            $table->dateTime('update_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新时间');
        });
        Schema::create('hot_news_current_hour', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rank')->default(1)->comment('排名');
            $table->string('content', 500)->comment('内容');
            $table->string('source', 5)->default('u')->comment('来源');
            $table->integer('heat')->nullable()->comment('热度');
            $table->string('uuid', 20)->nullable()->comment('标识 ID');
            $table->dateTime('update_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新时间');
        });
        Schema::create('hot_news_history', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 20)->nullable()->comment('标识 ID')->index();
            $table->string('content', 500)->comment('内容');
            $table->integer('heat')->comment('热度');
            $table->string('source', 5)->default('u')->comment('来源');
            $table->dateTime('calculate_time')->comment('统计时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hot_news_current');
        Schema::dropIfExists('hot_news_current_hour');
        Schema::dropIfExists('hot_news_history');
    }
}
